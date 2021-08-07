<?php

namespace Modules\Service\Http\Controllers;

use App\Helpers\StringHelper;
use App\Helpers\UploadHelper;
use App\Http\Controllers\Controller;
use Modules\Article\Entities\Category;
use App\Models\Track;
use Illuminate\Http\Request;
use Modules\Article\Entities\Page;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Service\Entities\Service;
use Yajra\DataTables\Facades\DataTables;

class ServiceController extends Controller
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
        if (is_null($this->user) || !$this->user->can('service.view')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        if (request()->ajax()) {
            if ($isTrashed) {
                $services = Service::orderBy('id', 'desc')
                    ->where('status', 0)
                    ->get();
            } else {
                $services = Service::orderBy('id', 'desc')
                    ->where('deleted_at', null)
                    ->where('status', 1)
                    ->get();
            }

            $datatable = DataTables::of($services, $isTrashed)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($row) use ($isTrashed) {
                        $csrf = "" . csrf_field() . "";
                        $method_delete = "" . method_field("delete") . "";
                        $method_put = "" . method_field("put") . "";
                        $html = '<a class="btn waves-effect waves-light btn-info btn-sm btn-circle" title="View Service Details" href="' . route('admin.services.show', $row->id) . '"><i class="fa fa-eye"></i></a>';

                        if ($row->deleted_at === null) {
                            $deleteRoute =  route('admin.services.destroy', [$row->id]);
                            if ($this->user->can('service.edit')) {
                                $html .= '<a class="btn waves-effect waves-light btn-success btn-sm btn-circle ml-1 " title="Edit Service Details" href="' . route('admin.services.edit', $row->id) . '"><i class="fa fa-edit"></i></a>';
                            }
                            if ($this->user->can('service.delete')) {
                                $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm btn-circle ml-1 text-white" title="Delete Admin" id="deleteItem' . $row->id . '"><i class="fa fa-trash"></i></a>';
                            }
                        } else {
                            $deleteRoute =  route('admin.services.trashed.destroy', [$row->id]);
                            $revertRoute = route('admin.services.trashed.revert', [$row->id]);

                            if ($this->user->can('service.delete')) {
                                $html .= '<a class="btn waves-effect waves-light btn-warning btn-sm btn-circle ml-1" title="Revert Back" id="revertItem' . $row->id . '"><i class="fa fa-check"></i></a>';
                                $html .= '
                                <form id="revertForm' . $row->id . '" action="' . $revertRoute . '" method="post" style="display:none">' . $csrf . $method_put . '
                                    <button type="submit" class="btn waves-effect waves-light btn-rounded btn-success"><i
                                            class="fa fa-check"></i> Confirm Revert</button>
                                    <button type="button" class="btn waves-effect waves-light btn-rounded btn-secondary" data-dismiss="modal"><i
                                            class="fa fa-times"></i> Cancel</button>
                                </form>';
                                $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm btn-circle ml-1 text-white" title="Delete Service Permanently" id="deleteItemPermanent' . $row->id . '"><i class="fa fa-trash"></i></a>';
                            }
                        }



                        $html .= '<script>
                            $("#deleteItem' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Service will be deleted as trashed !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                                }).then((result) => { if (result.value) {$("#deleteForm' . $row->id . '").submit();}})
                            });
                        </script>';

                        if ($this->user->can('service.delete')) {
                            $html .= '<script>
                            $("#deleteItemPermanent' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Service will be deleted permanently, both from trash !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                                }).then((result) => { if (result.value) {$("#deletePermanentForm' . $row->id . '").submit();}})
                            });
                        </script>';

                            $html .= '<script>
                            $("#revertItem' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Service will be revert back from trash !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, Revert Back!"
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

                ->editColumn('title', function ($row) {
                    return $row->title;
                })
                ->editColumn('banner_image', function ($row) {
                    if ($row->banner_image != null) {
                        return "<img src='" . asset('public/images/services/' . $row->banner_image) . "' class='img img-display-list' />";
                    }
                    return '-';
                })
                ->editColumn('image', function ($row) {
                    if ($row->image != null) {
                        return "<img src='" . asset('public/images/services/' . $row->image) . "' class='img img-display-list' />";
                    }
                    return '-';
                })
                ->addColumn('category', function ($row) {
                    $html = "";
                    $category = Category::find($row->category_id);
                    if (!is_null($category)) {
                        $html .= "<span>" . $category->name . "</span>";
                    } else {
                        $html .= "-";
                    }
                    return $html;
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
            $rawColumns = ['action', 'title', 'status', 'category', 'banner_image', 'image'];
            return $datatable->rawColumns($rawColumns)
                ->make(true);
        }

        $count_services = count(Service::select('id')->get());
        $count_active_services = count(Service::select('id')->where('status', 1)->get());
        $count_trashed_services = count(Service::select('id')->where('deleted_at', '!=', null)->get());
        return view('service::services.index', compact('count_services', 'count_active_services', 'count_trashed_services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::printCategory(null, 3);
        return view('service::services.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('service.create')) {
            return abort(403, 'You are not allowed to access this page !');
        }

        $request->validate([
            'title'  => 'required|max:100',
            'slug'  => 'nullable|max:100|unique:services,slug',
            'image'  => 'nullable|image',
            'banner_image'  => 'nullable|image'
        ]);

        try {
            DB::beginTransaction();
            $service = new Service();
            $service->title = $request->title;
            if ($request->slug) {
                $service->slug = $request->slug;
            } else {
                $service->slug = StringHelper::createSlug($request->title, 'Modules\Article\Entities\Page', 'slug', '-', true);
            }

            if (!is_null($request->banner_image)) {
                $service->banner_image = UploadHelper::upload('banner_image', $request->banner_image, $request->title . '-' . time() . '-banner', 'public/assets/images/services');
            }

            if (!is_null($request->image)) {
                $service->image = UploadHelper::upload('image', $request->image, $request->title . '-' . time() . '-logo', 'public/assets/images/services');
            }

            $service->category_id = $request->category_id;
            $service->status = $request->status;
            $service->description = $request->description;
            $service->meta_description = $request->meta_description;
            $service->created_at = Carbon::now();
            $service->created_by = Auth::id();
            $service->updated_at = Carbon::now();
            $service->save();

            Track::newTrack($service->title, 'New Service has been created');
            DB::commit();
            session()->flash('success', 'New Service has been created successfully !!');
            return redirect()->route('admin.services.index');
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
        if (is_null($this->user) || !$this->user->can('service.view')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $service = Service::find($id);
        $categories = DB::table('categories')->select('id', 'name')->get();
        return view('service::services.show', compact('categories', 'service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('service.edit')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $service = Service::find($id);
        $categories = Category::printCategory($service->category_id);
        return view('service::services.edit', compact('categories', 'service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->can('service.edit')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $service = Service::find($id);
        if (is_null($service)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.services.index');
        }

        $request->validate([
            'title'  => 'required|max:100',
            'slug'  => 'required|max:100|unique:services,slug,' . $service->id,
        ]);

        try {
            DB::beginTransaction();
            $service->title = $request->title;
            $service->slug = $request->slug;
            $service->status = $request->status;
            if (!is_null($request->banner_image)) {
                $service->banner_image = UploadHelper::update('banner_image', $request->banner_image, $request->title . '-' . time() . '-banner', 'public/assets/images/services', $service->banner_image);
            }

            if (!is_null($request->image)) {
                $service->image = UploadHelper::update('image', $request->image, $request->title . '-' . time() . '-logo', 'public/assets/images/services', $service->image);
            }

            $service->category_id = $request->category_id;
            $service->status = $request->status;
            $service->description = $request->description;
            $service->meta_description = $request->meta_description;
            $service->updated_by = Auth::id();
            $service->updated_at = Carbon::now();
            $service->save();

            Track::newTrack($service->title, 'Service has been updated successfully !!');
            DB::commit();
            session()->flash('success', 'Service has been updated successfully !!');
            return redirect()->route('admin.services.index');
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
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('service.delete')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $service = Service::find($id);
        if (is_null($service)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.services.trashed');
        }
        $service->deleted_at = Carbon::now();
        $service->deleted_by = Auth::id();
        $service->status = 0;
        $service->save();

        session()->flash('success', 'Service has been deleted successfully as trashed !!');
        return redirect()->route('admin.services.trashed');
    }

    /**
     * revertFromTrash
     *
     * @param integer $id
     * @return Remove the item from trash to active -> make deleted_at = null
     */
    public function revertFromTrash($id)
    {
        if (is_null($this->user) || !$this->user->can('service.delete')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $service = Service::find($id);
        if (is_null($service)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.services.trashed');
        }
        $service->deleted_at = null;
        $service->deleted_by = null;
        $service->save();

        session()->flash('success', 'Service has been revert back successfully !!');
        return redirect()->route('admin.services.trashed');
    }

    /**
     * destroyTrash
     *
     * @param integer $id
     * @return void Destroy the data permanently
     */
    public function destroyTrash($id)
    {
        if (is_null($this->user) || !$this->user->can('service.delete')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $service = Service::find($id);
        if (is_null($service)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.services.trashed');
        }

        // Remove Images
        UploadHelper::deleteFile('public/assets/images/services/' . $service->banner_image);
        UploadHelper::deleteFile('public/assets/images/services/' . $service->image);

        // Delete Service permanently
        $service->delete();

        session()->flash('success', 'Service has been deleted permanently !!');
        return redirect()->route('admin.services.trashed');
    }

    /**
     * trashed
     *
     * @return view the trashed data list -> which data status = 0 and deleted_at != null
     */
    public function trashed()
    {
        if (is_null($this->user) || !$this->user->can('service.view')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        return $this->index(true);
    }
}
