<?php

namespace Modules\Article\Http\Controllers;

use App\Helpers\StringHelper;
use App\Helpers\UploadHelper;
use App\Http\Controllers\Controller;
use App\Models\Track;
use Illuminate\Http\Request;
use Modules\Article\Entities\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class CategoriesController extends Controller
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

        if ( is_null($this->user) || ! $this->user->can('category.view') ) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        if (request()->ajax()) {
            if ($isTrashed) {
                $categories = Category::orderBy('id', 'desc')
                    ->where('status', 0)
                    ->get();
            } else {
                $categories = Category::orderBy('id', 'desc')
                    ->where('deleted_at', null)
                    ->where('status', 1)
                    ->get();
            }

            $datatable = DataTables::of($categories, $isTrashed)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($row) use ($isTrashed) {
                        $csrf = "" . csrf_field() . "";
                        $method_delete = "" . method_field("delete") . "";
                        $method_put = "" . method_field("put") . "";
                        $html = "";

                        if ($row->deleted_at === null) {
                            $deleteRoute =  route('admin.categories.destroy', [$row->id]);
                            if( $this->user->can('category.edit')) {
                                $html = '<a class="btn waves-effect waves-light btn-success btn-sm btn-circle" title="Edit Category Details" href="' . route('admin.categories.edit', $row->id) . '"><i class="fa fa-edit"></i></a>';
                            }
                            if( $this->user->can('category.delete')) {
                                $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm btn-circle ml-2 text-white" title="Delete Admin" id="deleteItem' . $row->id . '"><i class="fa fa-trash"></i></a>';
                            }
                        } elseif($this->user->can('category.delete')) {
                            $deleteRoute =  route('admin.categories.trashed.destroy', [$row->id]);
                            $revertRoute = route('admin.categories.trashed.revert', [$row->id]);

                            $html = '<a class="btn waves-effect waves-light btn-warning btn-sm btn-circle" title="Revert Back" id="revertItem' . $row->id . '"><i class="fa fa-check"></i></a>';
                            $html .= '
                            <form id="revertForm' . $row->id . '" action="' . $revertRoute . '" method="post" style="display:none">' . $csrf . $method_put . '
                                <button type="submit" class="btn waves-effect waves-light btn-rounded btn-success"><i
                                        class="fa fa-check"></i> Confirm Revert</button>
                                <button type="button" class="btn waves-effect waves-light btn-rounded btn-secondary" data-dismiss="modal"><i
                                        class="fa fa-times"></i> Cancel</button>
                            </form>';
                            $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm btn-circle ml-2 text-white" title="Delete Category Permanently" id="deleteItemPermanent' . $row->id . '"><i class="fa fa-trash"></i></a>';
                        }



                        $html .= '<script>
                            $("#deleteItem' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Category will be deleted as trashed !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                                }).then((result) => { if (result.value) {$("#deleteForm' . $row->id . '").submit();}})
                            });
                        </script>';

                        $html .= '<script>
                            $("#deleteItemPermanent' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Category will be deleted permanently, both from trash !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                                }).then((result) => { if (result.value) {$("#deletePermanentForm' . $row->id . '").submit();}})
                            });
                        </script>';

                        $html .= '<script>
                            $("#revertItem' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Category will be revert back from trash !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, Revert Back!"
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
                        return $html;
                    }
                )

                ->editColumn('name', function ($row) {
                    return $row->name;
                    // . ' <br /><a href="' . route('category.show', $row->slug) . '" target="_blank"><i class="fa fa-link"></i> View</a>';
                })
                ->editColumn('banner_image', function ($row) {
                    if ($row->banner_image != null) {
                        return "<img src='" . asset('public/assets/images/categories/' . $row->banner_image) . "' class='img img-display-list' />";
                    }
                    return '-';
                })
                ->editColumn('logo_image', function ($row) {
                    if ($row->logo_image != null) {
                        return "<img src='" . asset('public/assets/images/categories/' . $row->logo_image) . "' class='img img-display-list' />";
                    }
                    return '-';
                })
                ->addColumn('parent_category', function ($row) {
                    $html = "";
                    $parent = Category::find($row->parent_category_id);
                    if (!is_null($parent)) {
                        $html .= "<span>" . $parent->name . "</span>";
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
            $rawColumns = ['action', 'name', 'status', 'parent_category', 'banner_image', 'logo_image', 'priority'];
            return $datatable->rawColumns($rawColumns)
                ->make(true);
        }

        $count_categories = count(Category::select('id')->get());
        $count_active_categories = count(Category::select('id')->where('status', 1)->get());
        $count_trashed_categories = count(Category::select('id')->where('deleted_at', '!=', null)->get());
        return view('article::categories.index', compact('count_categories', 'count_active_categories', 'count_trashed_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::printCategory(null, $layer = 2);
        return view('article::categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('category.create')) {
            return abort(403, 'You are not allowed to access this page !');
        }

        $request->validate([
            'name'  => 'required|max:100',
            'slug'  => 'nullable|max:100|unique:categories,slug',
            'logo_image'  => 'nullable|image',
            'banner_image'  => 'nullable|image'
        ]);

        try {
            DB::beginTransaction();
            $category = new Category();
            $category->name = $request->name;
            if ($request->slug) {
                $category->slug = $request->slug;
            } else {
                $category->slug = StringHelper::createSlug($request->name, 'Modules\Article\Entities\Category', 'slug', '-', true);
            }

            if (!is_null($request->banner_image)) {
                $category->banner_image = UploadHelper::upload('banner_image', $request->banner_image, $request->name . '-' . time() . '-banner', 'public/assets/images/categories');
            }

            if (!is_null($request->logo_image)) {
                $category->logo_image = UploadHelper::upload('logo_image', $request->logo_image, $request->name . '-' . time() . '-logo', 'public/assets/images/categories');
            }

            $category->parent_category_id = $request->parent_category_id;
            $category->status = $request->status;
            if (!is_null($request->enable_bg)) {
                $category->enable_bg = 1;
                $category->bg_color = $request->bg_color;
                $category->text_color = $request->text_color;
            }

            $category->description = $request->description;
            $category->meta_description = $request->meta_description;
            $category->priority = $request->priority ? $request->priority : 1;
            $category->created_at = Carbon::now();
            $category->created_by = Auth::id();
            $category->updated_at = Carbon::now();
            $category->save();

            // Update priority column
            if(!$request->priority){
                $category->priority = $category->id;
                if($request->parent_category_id){
                    $lastCategoryPriorityValue = Category::where('parent_category_id', $request->parent_category_id)
                    ->orderBy('priority', 'desc')
                    ->value('priority');
                    if(!is_null($lastCategoryPriorityValue)){
                        $category->priority = (int) $lastCategoryPriorityValue + 1;
                    }
                }
                $category->save();
            }

            $data = [
                'category' => $category->id,
                'en' => $category->name,
                'key' => $category->slug
            ];

            Track::newTrack($category->name, 'New Category has been created');
            DB::commit();
            session()->flash('success', 'New Category has been created successfully !!');
            return redirect()->route('admin.categories.index');
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
    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('category.edit')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $category   = Category::find($id);
        $categories = Category::printCategory($category->parent_category_id, $layer = 2);

        return view('article::categories.edit', compact('categories', 'category'));
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
        if (is_null($this->user) || !$this->user->can('category.edit')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $category = Category::find($id);
        if (is_null($category)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.categories.index');
        }

        $request->validate([
            'name'  => 'required|max:100',
            'slug'  => 'required|max:100|unique:categories,slug,' . $category->id,
        ]);

        try {
            DB::beginTransaction();
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->status = $request->status;
            if (!is_null($request->banner_image)) {
                $category->banner_image = UploadHelper::update('banner_image', $request->banner_image, $request->name . '-' . time() . '-banner', 'public/assets/images/categories', $category->banner_image);
            }

            if (!is_null($request->logo_image)) {
                $category->logo_image = UploadHelper::update('logo_image', $request->logo_image, $request->name . '-' . time() . '-logo', 'public/assets/images/categories', $category->logo_image);
            }

            $category->parent_category_id = $request->parent_category_id;
            $category->status = $request->status;
            if (!is_null($request->enable_bg)) {
                $category->enable_bg = 1;
                $category->bg_color = $request->bg_color;
                $category->text_color = $request->text_color;
            } else {
                $category->enable_bg = 0;
            }
            $category->description = $request->description;
            $category->meta_description = $request->meta_description;
            $category->priority = $request->priority;
            $category->updated_by = Auth::id();
            $category->updated_at = Carbon::now();
            $category->save();

            // Update priority column
            if(!$request->priority){
                $category->priority = $category->id;
                if($request->parent_category_id){
                    $lastCategoryPriorityValue = Category::where('parent_category_id', $request->parent_category_id)
                    ->orderBy('priority', 'desc')
                    ->value('priority');
                    if(!is_null($lastCategoryPriorityValue)){
                        $category->priority = (int) $lastCategoryPriorityValue + 1;
                    }
                }
                $category->save();
            }

            $data = [
                'category' => $category->id,
                'en' => $category->name,
                'key' => $category->slug
            ];

            Track::newTrack($category->slug, 'Category has been updated successfully !!');
            DB::commit();
            session()->flash('success', 'Category has been updated successfully !!');
            return redirect()->route('admin.categories.index');
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
        if (is_null($this->user) || !$this->user->can('category.delete')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $category = Category::find($id);
        if (is_null($category)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.categories.trashed');
        }
        $category->deleted_at = Carbon::now();
        $category->deleted_by = Auth::id();
        $category->status = 0;
        $category->save();

        session()->flash('success', 'Category has been deleted successfully as trashed !!');
        return redirect()->route('admin.categories.trashed');
    }

    /**
     * revertFromTrash
     *
     * @param integer $id
     * @return Remove the item from trash to active -> make deleted_at = null
     */
    public function revertFromTrash($id)
    {
        if (is_null($this->user) || !$this->user->can('category.delete')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $category = Category::find($id);
        if (is_null($category)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.categories.trashed');
        }
        $category->deleted_at = null;
        $category->deleted_by = null;
        $category->save();

        session()->flash('success', 'Category has been revert back successfully !!');
        return redirect()->route('admin.categories.trashed');
    }

    /**
     * destroyTrash
     *
     * @param integer $id
     * @return void Destroy the data permanently
     */
    public function destroyTrash($id)
    {
        if (is_null($this->user) || !$this->user->can('category.delete')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $category = Category::find($id);
        if (is_null($category)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.categories.trashed');
        }

        // Remove Images
        UploadHelper::deleteFile('public/assets/images/categorys/' . $category->banner_image);
        UploadHelper::deleteFile('public/assets/images/categorys/' . $category->image);

        // Delete Category permanently
        $category->delete();

        session()->flash('success', 'Category has been deleted permanently !!');
        return redirect()->route('admin.categories.trashed');
    }

    /**
     * trashed
     *
     * @return view the trashed data list -> which data status = 0 and deleted_at != null
     */
    public function trashed()
    {
        if (is_null($this->user) || !$this->user->can('category.view')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        return $this->index(true);
    }
}
