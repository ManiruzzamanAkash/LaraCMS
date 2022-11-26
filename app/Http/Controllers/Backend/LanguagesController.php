<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\UploadHelper;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Track;
use Illuminate\Http\Request;
use App\Models\Language;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class LanguagesController extends Controller
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
        if (is_null($this->user) || !$this->user->can('blog.view')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        if (request()->ajax()) {
            $languages = Language::orderBy('id', 'desc')->get();

            $datatable = DataTables::of($languages)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($row) {
                        $html = '';
                        $html .= '<a class="btn waves-effect waves-light btn-success btn-sm btn-circle ml-1 " title="Edit Language Details" href="' . route('admin.languages.edit', $row->id) . '"><i class="fa fa-edit"></i></a>';
                        return $html;
                    }
                )

                ->editColumn('flag', function ($row) {
                    if ($row->flag != null) {
                        return "<img src='" . asset('public/img/flags/' . $row->flag) . "' class='img img-display-list' />";
                    }
                    return '-';
                })
                ->editColumn('banner', function ($row) {
                    if ($row->banner != null) {
                        return "<img src='" . asset('public/img/flags/' . $row->banner) . "' class='img img-display-list' />";
                    }
                    return '-';
                });

            $rawColumns = ['action', 'name', 'code', 'flag', 'banner', 'country'];
            return $datatable->rawColumns($rawColumns)
                ->make(true);
        }

        $count_languages = count(Language::select('id')->get());
        return view('backend.pages.languages.index', compact('count_languages'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // if (is_null($this->user) || !$this->user->can('language.view')) {
        //     $message = 'You are not allowed to access this page !';
        //     return view('errors.403', compact('message'));
        // }
        $countries = Country::get();
        return view('backend.pages.languages.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('blog.create')) {
            return abort(403, 'You are not allowed to access this page !');
        }

        $request->validate([
            'name'  => 'required|max:100',
            'code'  => 'required|string|max:100|unique:languages,code',
            'country_id'  => 'required'
        ]);

        try {
            DB::beginTransaction();
            $country = Country::find($request->country_id);

            $flag = null;
            if (!is_null($request->flag)) {
                $flag = UploadHelper::upload('flag', $request->flag, $request->name . '-' . time() . '-flag', 'public/img/flags/');
            }

            if (!is_null($request->banner)) {
                $banner = UploadHelper::upload('banner', $request->banner, $request->banner_caption . '-b-' . time(), 'public/img/flags/');
            }

            $language = Language::create([
                'name' => $request->name,
                'short_name' => $request->short_name,
                'code' => $request->code,
                'flag' => $flag,
                'banner' => $banner,
                'banner_caption' => $request->banner_caption,
                'country' => $country ? $country->name : '',
                'country_id' => $request->country_id
            ]);

            Track::newTrack($language->name, 'New Language has been created');
            DB::commit();
            session()->flash('success', 'New Language has been created successfully !!');
            return redirect()->route('admin.languages.index');
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
        if (is_null($this->user) || !$this->user->can('blog.view')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $language = Language::find($id);
        return view('backend.pages.languages.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('blog.edit')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $languages           = Language::all();
        $language            = Language::find($id);
        $countries           = Country::get();

        return view('backend.pages.languages.edit', compact('language', 'languages', 'countries'));
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
        if (is_null($this->user) || !$this->user->can('blog.edit')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $language = Language::find($id);
        if (is_null($language)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.languages.index');
        }

        $request->validate([
            'name'  => 'required|max:100',
            'code'  => 'required|string|max:100|unique:languages,code,' . $language->id,
            'country_id'  => 'required'
        ]);

        try {
            DB::beginTransaction();
            $country = Country::find($request->country_id);

            if (!is_null($request->flag)) {
                $flag = UploadHelper::update('flag', $request->flag, $request->name . '-' . time() . '-flag', 'public/img/flags/', $language->flag);
            } else {
                $flag = $language->flag;
            }

            if (!is_null($request->banner)) {
                $banner = UploadHelper::update('banner', $request->banner, $request->banner_caption . '-b-' . time(), 'public/img/flags/', $language->banner);
            } else {
                $banner = $language->banner;
            }

            $language->update([
                'name' => $request->name,
                'short_name' => $request->short_name,
                'code' => $request->code,
                'flag' => $flag,
                'banner' => $banner,
                'banner_caption' => $request->banner_caption,
                'country' => $country ? $country->name : '',
                'country_id' => $request->country_id
            ]);

            Track::newTrack($request->name, 'Language has been updated successfully !!');
            DB::commit();
            session()->flash('success', 'Language has been updated successfully !!');
            return redirect()->route('admin.languages.index');
        } catch (\Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            DB::rollBack();
            return back();
        }
    }
}
