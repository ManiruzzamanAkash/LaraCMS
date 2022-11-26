<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\StringHelper;
use App\Helpers\UploadHelper;
use App\Http\Controllers\Controller;
use App\Models\Track;
use Illuminate\Http\Request;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class AdminsController extends Controller
{

    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($isTrashed = false)
    {
        if (is_null($this->user) || !$this->user->can('user.view')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        if (request()->ajax()) {
            if ($isTrashed) {
                $users = Admin::orderBy('id', 'desc')
                    ->select('id', 'first_name', 'last_name', 'username', 'phone_no', 'email', 'status', 'deleted_at')
                    ->where('status', 0)
                    ->whereNotIn('email', ['manirujjamanakash@gmail.com'])
                    ->get();
            } else {
                $users = Admin::orderBy('id', 'desc')
                    ->select('id', 'first_name', 'last_name', 'username', 'phone_no', 'email', 'status', 'deleted_at')
                    ->where('deleted_at', null)
                    ->where('status', 1)
                    ->whereNotIn('email', ['manirujjamanakash@gmail.com'])
                    ->get();
            }

            $datatable = DataTables::of($users, $isTrashed)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($row) use ($isTrashed) {
                        $csrf = "" . csrf_field() . "";
                        $method_delete = "" . method_field("delete") . "";
                        $method_put = "" . method_field("put") . "";
                        $html = '';

                        if ($row->deleted_at === null) {
                            $deleteRoute =  route('admin.admins.destroy', [$row->id]);
                            if ($this->user->can('user.edit')) {
                                $html .= '<a class="btn waves-effect waves-light btn-success btn-sm btn-circle" title="Edit Admin Details" href="' . route('admin.admins.edit', $row->id) . '"><i class="fa fa-edit"></i></a>';
                            }
                            if ($this->user->can('user.delete')) {
                                $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm btn-circle ml-2 text-white" title="Delete Admin" id="deleteItem' . $row->id . '"><i class="fa fa-trash"></i></a>';
                            }
                        } else {
                            if ($this->user->can('user.delete')) {
                                $deleteRoute =  route('admin.admins.trashed.destroy', [$row->id]);
                                $revertRoute = route('admin.admins.trashed.revert', [$row->id]);

                                $html = '<a class="btn waves-effect waves-light btn-warning btn-sm btn-circle" title="Revert Back" id="revertItem' . $row->id . '"><i class="fa fa-check"></i></a>';
                                $html .= '<form id="revertForm' . $row->id . '" action="' . $revertRoute . '" method="post" style="display:none">' . $csrf . $method_put . '
                                    <button type="submit" class="btn waves-effect waves-light btn-rounded btn-success"><i
                                            class="fa fa-check"></i> Confirm Revert</button>
                                    <button type="button" class="btn waves-effect waves-light btn-rounded btn-secondary" data-dismiss="modal"><i
                                            class="fa fa-times"></i> Cancel</button>
                                </form>';
                                $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm btn-circle ml-2 text-white" title="Delete Admin Permanently" id="deleteItemPermanent' . $row->id . '"><i class="fa fa-trash"></i></a>';
                            }
                        }

                        if ($this->user->can('user.delete')) {
                            $html .= '<script>
                                $("#deleteItem' . $row->id . '").click(function(){
                                    swal.fire({ title: "Are you sure?",text: "Admin will be deleted as trashed !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                                    }).then((result) => { if (result.value) {$("#deleteForm' . $row->id . '").submit();}})
                                });
                            </script>';

                            $html .= '<script>
                                $("#deleteItemPermanent' . $row->id . '").click(function(){
                                    swal.fire({ title: "Are you sure?",text: "Admin will be deleted permanently, both from trash !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                                    }).then((result) => { if (result.value) {$("#deletePermanentForm' . $row->id . '").submit();}})
                                });
                            </script>';

                            $html .= '<script>
                                $("#revertItem' . $row->id . '").click(function(){
                                    swal.fire({ title: "Are you sure?",text: "Admin will be revert back from trash !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, Revert Back!"
                                    }).then((result) => { if (result.value) {$("#revertForm' . $row->id . '").submit();}})
                                });
                            </script>';

                            $html .= '
                                <form id="deleteForm' . $row->id . '" action="' . $deleteRoute . '" method="post" style="display:none">' . $csrf . $method_delete . '
                                    <button type="submit" class="btn waves-effect waves-light btn-rounded btn-success"><i
                                            class="fa fa-check"></i> Confirm Delete</button>
                                    <button type="button" class="btn waves-effect waves-light btn-rounded btn-secondary" data-dismiss="modal"><i
                                            class="fa fa-times"></i> Cancel</button>
                                </form>';

                            $html .= '
                                <form id="deletePermanentForm' . $row->id . '" action="' . $deleteRoute . '" method="post" style="display:none">' . $csrf . $method_delete . '
                                    <button type="submit" class="btn waves-effect waves-light btn-rounded btn-success"><i
                                            class="fa fa-check"></i> Confirm Permanent Delete</button>
                                    <button type="button" class="btn waves-effect waves-light btn-rounded btn-secondary" data-dismiss="modal"><i
                                            class="fa fa-times"></i> Cancel</button>
                                </form>';
                        }

                        return $html;
                    }
                )
                ->addColumn(
                    'role',
                    function ($row) {
                        $html = "";
                        $roles = Admin::find($row->id)->getRoleNames();
                        foreach ($roles as $role) {
                            $html .= "<span class='badge badge-info'>" . $role . "</span> &nbsp;";
                        }
                        if (count($roles) === 0) {
                            $html = "-";
                        }
                        return $html;
                    }
                )
                ->editColumn('name', function ($row) {
                    return $row->first_name . ' ' . $row->last_name;
                })
                ->editColumn('status', function ($row) {
                    if ($row->status) {
                        return '<span class="badge badge-success font-weight-100">Active</span>';
                    } else if ($row->deleted_at != null) {
                        return '<span class="badge badge-danger">Trashed</span>';
                    } else {
                        return '<span class="badge badge-warning">Inactive</span>';
                    }
                });
            $rawColumns = ['action', 'name', 'status', 'role'];
            return $datatable->rawColumns($rawColumns)
                ->make(true);
        }

        $count_admins = count(Admin::select('id')->get());
        $count_active_admins = count(Admin::select('id')->where('status', 1)->get());
        $count_trashed_admins = count(Admin::select('id')->where('deleted_at', '!=', null)->get());
        return view('backend.pages.admins.index', compact('count_admins', 'count_active_admins', 'count_trashed_admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('user.create')) {
            return abort(403, 'You are not allowed to access this page !');
        }

        $roles = DB::table('roles')->get();
        $languages = DB::table('languages')->get();
        $social_links = Admin::socialLinks();
        return view('backend.pages.admins.create', compact('roles', 'languages', 'social_links'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('user.create')) {
            return abort(403, 'You are not allowed to access this page !');
        }

        $request->validate([
            'first_name'  => 'required|max:100',
            'username'  => 'nullable|max:100|unique:admins,username',
            'email'  => 'required|max:100|unique:admins,email',
            'phone_no'  => 'required|max:15|unique:admins,phone_no',
            'password'  => 'required|confirmed|max:100',
        ]);

        try {
            DB::beginTransaction();
            $admin = new Admin();
            $admin->first_name = $request->first_name;
            $admin->last_name = $request->last_name;
            if ($request->username) {
                $admin->username = $request->username;
            } else {
                $admin->username = StringHelper::createSlug($request->first_name . $request->last_name, 'Admin', 'username', '');
            }

            if (!is_null($request->avatar)) {
                $admin->avatar = UploadHelper::upload('avatar', $request->avatar, $request->first_name . '-' . time(), 'public/assets/images/admins');
            }

            $admin->phone_no = $request->phone_no;
            $admin->email = $request->email;
            $admin->password = Hash::make($request->password);
            $admin->status = $request->status;
            $admin->visible_in_team = $request->visible_in_team;
            $admin->designation = $request->designation;
            $admin->social_links = json_encode($request->social_links);
            $admin->created_at = Carbon::now();
            $admin->created_by = Auth::id();
            $admin->updated_at = Carbon::now();
            $admin->save();

            // Assign Roles
            if ($request->roles != null) {
                foreach ($request->roles as $role) {
                    $admin->assignRole($role);
                }
            }

            Track::newTrack($admin->username, 'New Admin has been created');
            DB::commit();
            session()->flash('success', 'New Admin has been created successfully !!');
            return redirect()->route('admin.admins.index');
        } catch (\Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            DB::rollBack();
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $isProfileUpdate = false)
    {
        if (!$isProfileUpdate) {
            if (is_null($this->user) || !$this->user->can('user.edit')) {
                $message = 'You are not allowed to access this page !';
                return view('errors.403', compact('message'));
            }
        }

        $admin = Admin::find($id);
        $roles = DB::table('roles')->get();
        $languages = DB::table('languages')->get();
        $social_links = Admin::socialLinks();
        return view('backend.pages.admins.edit', compact('roles', 'admin', 'languages', 'social_links'));
    }


    public function editProfile(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('admin_profile.edit')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $id = Auth::id();
        return $this->edit($id, true);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $isProfileUpdate = false)
    {

        if (!$isProfileUpdate) {
            if (is_null($this->user) || !$this->user->can('user.edit')) {
                $message = 'You are not allowed to access this page !';
                return view('errors.403', compact('message'));
            }
        }

        $admin = Admin::find($id);

        if (is_null($admin)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.admins.index');
        }

        // $request->validate([
        //     'first_name' => 'required|max:100',
        //     'username'   => 'required|max:100|unique: users,username,' . $admin->id,
        //     'email'      => 'required|max:100|unique: users,email,' . $admin->id,
        //     'phone_no'   => 'required|max:15|unique : users,phone_no,' . $admin->id,
        //     'password'   => 'nullable|confirmed|max: 100',
        // ]);

        try {
            DB::beginTransaction();
            $admin->first_name   = $request->first_name;
            $admin->last_name    = $request->last_name;
            $admin->username     = $request->username;
            $admin->phone_no     = $request->phone_no;
            $admin->email        = $request->email;

            if (!is_null($request->password)) {
                $admin->password = Hash::make($request->password);
            }

            if (!is_null($request->avatar)) {
                $admin->avatar   = UploadHelper::update('avatar', $request->avatar, $request->username, 'public/assets/images/admins', $admin->avatar);
            }

            $admin->status          = $request->status;
            $admin->visible_in_team = $request->visible_in_team;
            $admin->designation     = $request->designation;
            $admin->social_links    = json_encode($request->social_links);
            $admin->updated_by      = auth()->user()->id;
            $admin->updated_at      = Carbon::now();
            $admin->save();

            if (!$isProfileUpdate) {
                // Detach roles and Assign Roles
                $admin->roles()->detach();

                if (!is_null($request->roles)) {
                    foreach ($request->roles as $role) {
                        $admin->assignRole($role);
                    }
                }
            }

            Track::newTrack($admin->username, 'Admin has been updated successfully !!');
            DB::commit();
            session()->flash('success', 'Admin has been updated successfully !!');

            if ($isProfileUpdate)    return back();
            return redirect()->route('admin.admins.index');
        } catch (\Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            DB::rollBack();
            return back();
        }
    }

    public function updateProfile(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('admin_profile.edit')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $id = Auth::id();
        return $this->update($request, $id, true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('user.delete')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $admin = Admin::find($id);
        if (is_null($admin)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.admins.trashed');
        }
        $admin->deleted_at = Carbon::now();
        $admin->deleted_by = Auth::id();
        $admin->status = 0;
        $admin->save();

        session()->flash('success', 'Admin has been deleted successfully as trashed !!');
        return redirect()->route('admin.admins.trashed');
    }

    /**
     * revertFromTrash
     *
     * @param integer $id
     * @return Remove the item from trash to active -> make deleted_at = null
     */
    public function revertFromTrash($id)
    {
        if (is_null($this->user) || !$this->user->can('user.delete')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $admin = Admin::find($id);
        if (is_null($admin)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.admins.trashed');
        }
        $admin->deleted_at = null;
        $admin->deleted_by = null;
        $admin->save();

        session()->flash('success', 'Admin has been revert back successfully !!');
        return redirect()->route('admin.admins.trashed');
    }

    /**
     * destroyTrash
     *
     * @param integer $id
     * @return void Destroy the data permanently
     */
    public function destroyTrash($id)
    {
        if (is_null($this->user) || !$this->user->can('user.delete')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $admin = Admin::find($id);
        if (is_null($admin)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.admins.trashed');
        }

        $admin->roles()->detach();
        $admin->delete();

        session()->flash('success', 'Admin has been deleted permanently !!');
        return redirect()->route('admin.admins.trashed');
    }

    /**
     * trashed
     *
     * @return view the trashed data list -> which data status = 0 and deleted_at != null
     */
    public function trashed()
    {
        if (is_null($this->user) || !$this->user->can('user.view')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        return $this->index(true);
    }
}
