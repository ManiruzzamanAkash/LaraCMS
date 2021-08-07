<?php

namespace App\Http\Controllers\Backend\Modules\Word;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Track;
use Illuminate\Http\Request;
use App\Models\Word;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class WordsController extends Controller
{

    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
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
        if (is_null($this->user) || !$this->user->can('word.view')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        if (request()->ajax()) {
            if ($isTrashed) {
                $words = Word::orderBy('id', 'desc')
                    ->withTrashed()
                    ->where('status', 0)
                    ->get();
            } else {
                $words = Word::orderBy('id', 'desc')
                    ->where('deleted_at', null)
                    ->where('status', 1)
                    ->get();
            }

            $datatable = DataTables::of($words, $isTrashed)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($row) use ($isTrashed) {
                        $csrf = "" . csrf_field() . "";
                        $method_delete = "" . method_field("delete") . "";
                        $method_put = "" . method_field("put") . "";
                        $html = "";
                        // $html = '<a class="btn waves-effect waves-light btn-info btn-sm btn-circle" en="View Word Details" href="' . route('admin.words.show', $row->id) . '"><i class="fa fa-eye"></i></a>';

                        if ($row->deleted_at === null) {
                            $deleteRoute =  route('admin.words.destroy', [$row->id]);
                            if ($this->user->can('word.edit')) {
                                $html .= '<a class="btn waves-effect waves-light btn-success btn-sm btn-circle ml-1 " en="Edit Word Details" href="' . route('admin.words.edit', $row->id) . '"><i class="fa fa-edit"></i></a>';
                            }
                            if ($this->user->can('word.delete')) {
                                $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm btn-circle ml-1 text-white" en="Delete Admin" id="deleteItem' . $row->id . '"><i class="fa fa-trash"></i></a>';
                            }
                        } else {
                            $deleteRoute =  route('admin.words.trashed.destroy', [$row->id]);
                            $revertRoute = route('admin.words.trashed.revert', [$row->id]);

                            $html .= '<a class="btn waves-effect waves-light btn-warning btn-sm btn-circle ml-1" en="Revert Back" id="revertItem' . $row->id . '"><i class="fa fa-check"></i></a>';
                            $html .= '
                            <form id="revertForm' . $row->id . '" action="' . $revertRoute . '" method="post" style="display:none">' . $csrf . $method_put . '
                                <button type="submit" class="btn waves-effect waves-light btn-rounded btn-success"><i
                                        class="fa fa-check"></i> Confirm Revert</button>
                                <button type="button" class="btn waves-effect waves-light btn-rounded btn-secondary" data-dismiss="modal"><i
                                        class="fa fa-times"></i> Cancel</button>
                            </form>';
                            $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm btn-circle ml-1 text-white" en="Delete Word Permanently" id="deleteItemPermanent' . $row->id . '"><i class="fa fa-trash"></i></a>';
                        }



                        $html .= '<script>
                            $("#deleteItem' . $row->id . '").click(function(){
                                swal.fire({ en: "Are you sure?",text: "Word will be deleted as trashed !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                                }).then((result) => { if (result.value) {$("#deleteForm' . $row->id . '").submit();}})
                            });
                        </script>';

                        $html .= '<script>
                            $("#deleteItemPermanent' . $row->id . '").click(function(){
                                swal.fire({ en: "Are you sure?",text: "Word will be deleted permanently, both from trash !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                                }).then((result) => { if (result.value) {$("#deletePermanentForm' . $row->id . '").submit();}})
                            });
                        </script>';

                        $html .= '<script>
                            $("#revertItem' . $row->id . '").click(function(){
                                swal.fire({ en: "Are you sure?",text: "Word will be revert back from trash !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, Revert Back!"
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

                ->editColumn('en', function ($row) {
                    return $row->en;
                })

                ->editColumn('status', function ($row) {
                    if ($row->status) {
                        return '<span class="badge badge-success font-weight-100">Active</span>';
                    } else if ($row->deleted_at != null) {
                        return '<span class="badge badge-danger">Trashed</span>';
                    } else {
                        return '<span class="badge badge-warning">Inactive</span>';
                    }
                })
                ->editColumn('is_section', function ($row) {
                    if ($row->is_section) {
                        return '<span class="badge badge-success font-weight-100">Yes</span>';
                    } else {
                        return '<span class="badge badge-warning">No</span>';
                    }
                });

            $rawColumns = ['action', 'en', 'status', 'category', 'chapter', 'order_nr', 'is_section'];
            return $datatable->rawColumns($rawColumns)
                ->make(true);
        }

        $count_words = count(Word::select('id')->get());
        $count_active_words = count(Word::select('id')->where('status', 1)->get());
        $count_trashed_words = count(Word::select('id')->withTrashed()->where('status', 0)->get());
        return view('backend.pages.words.index', compact('count_words', 'count_active_words', 'count_trashed_words'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('word.create')) {
            return abort(403, 'You are not allowed to access this page !');
        }

        $categories = Category::printCategory(null, 3);
        $order_nr = Word::max('id') + 1;
        return view('backend.pages.words.create', compact('categories', 'order_nr'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('word.create')) {
            return abort(403, 'You are not allowed to access this page !');
        }

        $request->validate([
            'en'  => 'required|max:100',
            'category_id'  => 'required|numeric',
        ], [
            'en.required' => 'Please give Word',
            'category_id.required' => 'Please select a chapter',
        ]);

        $category = Category::find($request->category_id);

        try {
            if (!is_null($category)) {
                if (is_null($category->parent_category_id)) {
                    session()->flash('sticky_error', 'Please choose a chapter properly ');
                    return back();
                } else {
                    DB::beginTransaction();
                    $parent_category = Category::find($category->parent_category_id);

                    $word              = new Word();
                    $word->en          = $request->en;
                    $word->category_id = $parent_category->id;
                    $word->category    = $parent_category->name;
                    $word->chapter_id  = $request->category_id;
                    $word->chapter     = $category->name;
                    $word->status      = $request->status;
                    $word->order_nr    = $request->order_nr;
                    $word->is_section  = $request->is_section;
                    $word->created_at  = Carbon::now();
                    $word->created_by  = Auth::guard('web')->id();
                    $word->updated_at  =  Carbon::now();
                    $word->save();

                    Track::newTrack($word->en, 'New Word has been saved');
                    DB::commit();
                    session()->flash('success', 'New Word has been created successfully !!');
                    return redirect()->route('admin.words.index');
                }
            } else {
                session()->flash('sticky_error', 'Please choose a chapter properly ');
                return back();
            }
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
        if (is_null($this->user) || !$this->user->can('word.view')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $word = Word::withTrashed()->find($id);
        $categories = DB::table('categories')->select('id', 'name')->get();
        return view('backend.pages.words.show', compact('categories', 'page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('word.edit')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $word = Word::withTrashed()->find($id);
        $categories = Category::printCategory($word->chapter_id);
        return view('backend.pages.words.edit', compact('categories', 'word'));
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
        if (is_null($this->user) || !$this->user->can('word.edit')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $word = Word::withTrashed()->find($id);
        if (is_null($word)) {
            session()->flash('error', "The word is not found !");
            return redirect()->route('admin.words.index');
        }

        $request->validate([
            'en'  => 'required|max:100',
            'category_id'  => 'required|numeric',
        ], [
            'en.required' => 'Please give Word',
            'category_id.required' => 'Please select a chapter',
        ]);

        $category = Category::find($request->category_id);

        try {
            if (!is_null($category)) {
                if (is_null($category->parent_category_id)) {
                    session()->flash('sticky_error', 'Please choose a chapter properly ');
                    return back();
                } else {
                    DB::beginTransaction();
                    $parent_category   = Category::find($category->parent_category_id);
                    $word->en          = $request->en;
                    $word->category_id = $parent_category->id;
                    $word->category    = $parent_category->name;
                    $word->chapter_id  = $request->category_id;
                    $word->chapter     = $category->name;
                    $word->status      = $request->status;
                    $word->order_nr    = $request->order_nr;
                    $word->is_section  = $request->is_section;
                    $word->updated_at  = Carbon::now();
                    $word->updated_by  = Auth::guard('web')->id();
                    $word->save();

                    Track::newTrack($word->en, 'New Word has been saved');
                    DB::commit();
                    session()->flash('success', 'New Word has been updated successfully !!');
                    return redirect()->route('admin.words.index');
                }
            } else {
                session()->flash('sticky_error', 'Please choose a chapter properly ');
                return back();
            }
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
        if (is_null($this->user) || !$this->user->can('word.delete')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $word = Word::withTrashed()->find($id);
        if (is_null($word)) {
            session()->flash('error', "The word is not found !");
            return redirect()->route('admin.words.trashed');
        }
        $word->deleted_at = Carbon::now();
        $word->deleted_by = Auth::guard('web')->id();
        $word->status = 0;
        $word->save();

        session()->flash('success', 'Word has been deleted successfully as trashed !!');
        return redirect()->route('admin.words.trashed');
    }

    /**
     * revertFromTrash
     *
     * @param integer $id
     * @return Remove the item from trash to active -> make deleted_at = null
     */
    public function revertFromTrash($id)
    {
        if (is_null($this->user) || !$this->user->can('word.delete')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $word = Word::withTrashed()->find($id);
        if (is_null($word)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.words.trashed');
        }
        $word->status = 1;
        $word->deleted_at = null;
        $word->deleted_by = null;
        $word->save();

        session()->flash('success', 'Word has been revert back successfully !!');
        return redirect()->route('admin.words.trashed');
    }

    /**
     * destroyTrash
     *
     * @param integer $id
     *
     * @return void Destroy the data permanently
     */
    public function destroyTrash($id)
    {
        if (is_null($this->user) || !$this->user->can('word.delete')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $word = Word::withTrashed()->find($id);

        if (is_null($word)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.words.trashed');
        }

        // Delete Word permanently
        $word->forceDelete();

        session()->flash('success', 'Word has been deleted permanently !!');
        return redirect()->route('admin.words.trashed');
    }

    /**
     * trashed
     *
     * @return view the trashed data list -> which data status = 0 and deleted_at != null
     */
    public function trashed()
    {
        if (is_null($this->user) || !$this->user->can('word.view')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        return $this->index(true);
    }
}
