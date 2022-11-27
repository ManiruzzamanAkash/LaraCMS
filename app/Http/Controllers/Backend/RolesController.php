<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Contracts\Role;
use Yajra\DataTables\Facades\DataTables;

class RolesController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }
    // INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES (NULL, 'contact.view', 'admin', 'contact', NOW(), NOW()); 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Role $role)
    {
        if (is_null($this->user) || !$this->user->can('role.view')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        if (request()->ajax()) {
            $roles = DB::table('roles')->select('id', 'name')->get();

            $datatable = DataTables::of($roles)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($row) {
                        $csrf = "" . csrf_field() . "";
                        $method_delete = "" . method_field("delete") . "";
                        $html = '';

                        if($this->user->can('role.edit')) {
                            $html .= '<a class="btn waves-effect waves-light btn-info btn-sm btn-circle" name="View Role Details" href="' . route('admin.roles.show', $row->id) . '"><i class="fa fa-eye"></i></a>';
                        }

                        if($this->user->can('role.delete')) {
                            $html .= '<a class="btn waves-effect waves-light btn-success btn-sm btn-circle ml-1" name="Edit Role" href="' . route('admin.roles.edit', $row->id) . '"><i class="fa fa-edit"></i></a>';

                            $deleteRoute =  route('admin.roles.destroy', [$row->id]);
                            $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm btn-circle ml-1 text-white" name="Delete Admin" id="deleteItem' . $row->id . '"><i class="fa fa-trash"></i></a>';

                            $html .= '<script>
                                $("#deleteItem' . $row->id . '").click(function(){
                                    swal.fire({ name: "Are you sure?",text: "Role will be deleted as trashed !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                                    }).then((result) => { if (result.value) {$("#deleteForm' . $row->id . '").submit();}})
                                });
                            </script>';

                            $html .= '
                                <form id="deleteForm' . $row->id . '" action="' . $deleteRoute . '" method="post" style="display:none">' . $csrf . $method_delete . '
                                    <button type="submit" class="btn waves-effect waves-light btn-rounded btn-success"><i
                                            class="fa fa-check"></i> Confirm Delete</button>
                                    <button type="button" class="btn waves-effect waves-light btn-rounded btn-secondary" data-dismiss="modal"><i
                                            class="fa fa-times"></i> Cancel</button>
                                </form>';
                        }

                        return $html;
                    }
                )
                ->addColumn(
                    'permissions',
                    function ($row) use ($role) {
                        $name = $row->name;
                        $roleMain = $role::findByName($name, 'admin');
                        $html = "";
                        if (!is_null($roleMain)) {
                            // foreach ($roleMain->permissions()->get() as $permission) {
                            //     $html .= "<span class='badge badge-default mr-1'>" . $permission->name . "</span>";
                            // }
                            $html .= "Total - <span class='badge badge-default mr-1'>" . count($roleMain->permissions()->get()) . "</span>";
                        }
                        return $html;
                    }
                );
            $rawColumns = ['action', 'name', 'permissions'];
            return $datatable->rawColumns($rawColumns)->make(true);
        }

        $count_roles = count(DB::table('roles')->select('id')->get());
        $count_permissions = count(DB::table('permissions')->select('id')->get());
        return view('backend.pages.roles.index', compact('count_roles', 'count_permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('role.create')) {
            return abort(403, 'You are not allowed to access this page !');
        }

        $permissions_group = Admin::getAdminPermissionGroups();
        $all_permissions = DB::table('permissions')->select('id', 'name')->get();

        return view('backend.pages.roles.create', compact('permissions_group', 'all_permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Role $roleModel)
    {
        if (is_null($this->user) || !$this->user->can('role.create')) {
            return abort(403, 'You are not allowed to access this page !');
        }

        $request->validate([
            'name'  => 'required|max:100|unique:roles'
        ]);

        try {

            DB::beginTransaction();
            $permissions = $request->input('permissions');
            DB::table('roles')->insert([
                'name' => $request->name,
                'guard_name' => 'admin',
            ]);
            $role = $roleModel::findByName($request->name, 'admin');

            if (!empty($permissions)) {
                $role->syncPermissions($permissions);
            }

            Track::newTrack($role->name, 'New Role has been created');
            DB::commit();
            session()->flash('success', 'New Role has been created successfully !!');
            return redirect()->route('admin.roles.index');
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
    public function show($id, Role $roleModel)
    {
        if (is_null($this->user) || !$this->user->can('role.view')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $role = $roleModel::findById($id, 'admin');
        $permissions_group = Admin::getAdminPermissionGroups();
        $all_permissions = DB::table('permissions')->select('id', 'name')->get();
        return view('backend.pages.roles.show', compact('permissions_group', 'role', 'all_permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Role $role)
    {
        if (is_null($this->user) || !$this->user->can('role.edit')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $role = $role::findById($id, 'admin');
        $permissions_group = Admin::getAdminPermissionGroups();
        $all_permissions = DB::table('permissions')->select('id', 'name')->get();
        return view('backend.pages.roles.edit', compact('permissions_group', 'role', 'all_permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Role $roleModel)
    {
        if (is_null($this->user) || !$this->user->can('role.edit')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $role = $roleModel::findById($id, 'admin');
        if (is_null($role)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.roles.index');
        }

        $request->validate([
            'name'  => 'required|max:100|unique:roles,name,' . $id
        ]);

        try {
            DB::beginTransaction();
            $role->name = $request->name;
            $role->save();

            // Update the permissions
            $permissions = $request->permissions;
            if (!empty($permissions)) {
                $role->syncPermissions($permissions);
            }

            Track::newTrack($role->name, 'Role has been updated successfully !!');
            DB::commit();
            session()->flash('success', 'Role has been updated successfully !!');
            return redirect()->route('admin.roles.index');
        } catch (\Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            DB::rollBack();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Role $roleModel)
    {
        if (is_null($this->user) || !$this->user->can('role.delete')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $role = $roleModel::findById($id, 'admin');
        if (is_null($role)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.roles.index');
        }
        $role->delete();

        session()->flash('success', 'Role has been deleted successfully !!');
        return redirect()->route('admin.roles.index');
    }
}
