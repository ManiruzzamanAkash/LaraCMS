<?php

namespace App\Http\Controllers\Backend\Modules\Settings;

use App\Http\Controllers\Controller;
use App\Models\Track;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Page;
use App\Models\Setting;
use App\Helpers\UploadHelper;
use App\Helpers\StringHelper;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;
use DB;

class PagesController extends Controller
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
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('dashboard.view')) {
            return abort(403, 'You are not allowed to access this page !');
        }
        $user = Auth::user();
        //Track::newTrack('Dashboard Page Viwed', 'Deshboard page viewed');
        return view('backend.pages.index', compact('user'));
    }


    public function pagesList()
    {

        if (is_null($this->user) || !$this->user->can('pages.view')) {
            return abort(403, 'You are not allowed to access this page !');
        }

        if (request()->ajax()) {
            $pages = Page::orderBy('id', 'desc')
                ->select(
                    'id',
                    'title',
                    'slug',
                    'image'

                )
                ->get();

            // dd($pages);
            $datatable = Datatables::of($pages)
                ->addColumn(
                    'action',
                    function ($row) {
                        $csrf = "" . csrf_field() . "";
                        $html = '<div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="' . route('admin.pages.edit', $row->id) . '">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                </div>
                            </div>
                            ';
                        return $html;
                    }
                )
                ->editColumn('image', function ($row) {
                    $url = url("public/assets/backend/images/pages/" . $row->image);
                    return '<a class="dropdown-item" href="#showModal' . $row->id . '" data-toggle="modal"><img class="report-min-img" src="' . $url . '"></a>

                      <div class="modal fade delete-modal" id="showModal' . $row->id . '" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">' . $row->title . '-Image</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img class="modal-max-img" src="' . $url . '">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal"><i
                                                class="fa fa-times"></i> Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                });
            $rawColumns = ['action', 'image'];
            return $datatable->rawColumns($rawColumns)
                ->make(true);
        }



        //Track::newTrack('Dashboard Page Viwed', 'Deshboard page viewed');
        return view('backend.pages.pages.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('pages.create')) {
            return abort(403, 'You are not allowed to access this page !');
        }
        return view('backend.pages.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /**
     * Store .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('pages.create')) {
            return abort(403, 'You are not allowed to access this page !');
        }
        $request->validate([
            'title'  => 'required|max:100',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            DB::beginTransaction();
            $pages = new Page();
            $pages->title = $request->title;
            if (is_null($request->slug)) {
                $pages->slug = StringHelper::createSlug($request->title, 'Page', 'slug', '');
            } else {
                $pages->slug = $request->slug;
            }

            if (!is_null($request->image)) {
                $pages->image = UploadHelper::upload('image', $request->image, $request->title . '-' . time(), 'public/assets/backend/images/pages');
            }
            $pages->description = $request->description;
            $pages->created_at = Carbon::now();
            $pages->updated_at = Carbon::now();
            $pages->save();

            Track::newTrack('New Page Created', 'New page created');

            DB::commit();
            session()->flash('success', 'New Page has been saved successfully !!');

            return redirect()->route('admin.pages.index');
        } catch (\Exception $e) {
            // session()->flash('db_error', 'Error On: '."File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());
            session()->flash('db_error', $e->getMessage());
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
        if (is_null($this->user) || !$this->user->can('pages.create')) {
            return abort(403, 'You are not allowed to access this page !');
        }

        $pages = Page::find($id);

        return view('backend.pages.pages.edit')->with(compact('pages'));
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
        if (is_null($this->user) || !$this->user->can('pages.create')) {
            return abort(403, 'You are not allowed to access this page !');
        }
        $request->validate([
            'title'  => 'required|max:100',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            DB::beginTransaction();
            $pages = Page::find($id);
            $pages->title = $request->title;
            // $pages->slug = $request->slug;

            if (!is_null($request->image)) {
                $pages->image = UploadHelper::upload('image', $request->image, $request->title . '-' . time(), 'public/assets/backend/images/pages');
            }
            $pages->description = $request->description;
            $pages->created_at = Carbon::now();
            $pages->updated_at = Carbon::now();
            $pages->save();

            Track::newTrack($request->title, 'Page was updated');

            DB::commit();
            session()->flash('success', 'Page has been updated successfully !!');

            return redirect()->route('admin.pages.index');
        } catch (\Exception $e) {
            // session()->flash('db_error', 'Error On: '."File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());
            session()->flash('db_error', $e->getMessage());
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
        //
    }

    /**
     * Settings edit page
     */

    public function settings()
    {

        if (is_null($this->user) || !$this->user->can('settings.edit')) {
            return abort(403, 'You are not allowed to access this page !');
        }

        $settings = Setting::first();

        return view('backend.pages.settings.edit')->with(compact('settings'));
    }

    public function settingsUpdate(Request $request, $id)
    {

        if (is_null($this->user) || !$this->user->can('settings.edit')) {
            return abort(403, 'You are not allowed to access this page !');
        }
        $request->validate([
            'name'  => 'required|max:100',
            'address'  => 'required|max:100',
            'footer_text'  => 'required|max:100',
            // if(!is_null($request->logo){
            // 'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // }

        ]);

        try {
            DB::beginTransaction();
            $settings = Setting::find($id);
            $settings->name = $request->name;
            if (!is_null($request->logo)) {
                $settings->logo = UploadHelper::upload('logo', $request->logo, $request->title . '-' . time(), 'public/assets/backend/images/logo');
            }
            $settings->contact_toll_free_number = $request->contact_toll_free_number;
            $settings->contact_hotline_number = $request->contact_hotline_number;
            $settings->email = $request->email;
            $settings->address = $request->address;
            $settings->office_hour = $request->office_hour;
            $settings->facebook_link = $request->facebook_link;
            $settings->twitter_link = $request->twitter_link;
            $settings->linkdin_link = $request->linkdin_link;
            $settings->instagram_link = $request->instagram_link;
            $settings->footer_text = $request->footer_text;
            $settings->save();

            Track::newTrack('Settings', 'Setting was updated');

            DB::commit();
            session()->flash('success', 'Settings has been updated successfully !!');

            return redirect()->route('admin.pages.settings');
        } catch (\Exception $e) {
            // session()->flash('db_error', 'Error On: '."File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());
            session()->flash('db_error', $e->getMessage());
            DB::rollBack();
            return back();
        }
    }
}
