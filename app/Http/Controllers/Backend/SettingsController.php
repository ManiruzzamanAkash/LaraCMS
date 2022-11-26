<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\UploadHelper;
use App\Http\Controllers\Controller;
use App\Models\Track;
use App\Settings\ContactSettings;
use App\Settings\GeneralSettings;
use App\Settings\SocialSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;

class SettingsController extends Controller
{
    public $user;

    public GeneralSettings $general;
    public ContactSettings $contact;
    public SocialSettings $social;

    public function __construct(GeneralSettings $general, ContactSettings $contact, SocialSettings $social)
    {
        $this->general = $general;
        $this->contact = $contact;
        $this->social = $social;

        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    public function index()
    {
        if (is_null($this->user) || !$this->user->can('settings.edit')) {
            return abort(403, 'You are not allowed to access this page.');
        }

        return view('backend.pages.settings.edit');
    }

    public function update(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('settings.edit')) {
            return abort(403, 'You are not allowed to access this page.');
        }

        try {
            DB::beginTransaction();

            // General settings update.
            $this->general->name = $request->name;
            if (!is_null($request->logo)) {
                $this->general->logo = UploadHelper::update('logo', $request->logo, 'logo', 'public/assets/images/logo', $this->general->logo);
            }

            if (!is_null($request->favicon)) {
                $this->general->favicon = UploadHelper::update('favicon', $request->favicon, 'favicon', 'public/assets/images/logo', $this->general->favicon);
            }

            $this->general->description      = $request->description;
            $this->general->copyright_text   = $request->copyright_text;
            $this->general->meta_keywords    = $request->meta_keywords;
            $this->general->meta_description = $request->meta_description;
            $this->general->meta_author      = $request->meta_author;
            $this->general->save();

            // Contact settings update.
            $this->contact->contact_no        = $request->contact_no;
            $this->contact->phone             = $request->phone;
            $this->contact->email_primary     = $request->email_primary;
            $this->contact->email_secondary   = $request->email_secondary;
            $this->contact->address           = $request->address;
            $this->contact->working_day_hours = $request->working_day_hours;
            $this->contact->map_lat           = $request->map_lat;
            $this->contact->map_long          = $request->map_long;
            $this->contact->map_zoom          = $request->map_zoom;
            $this->contact->save();

            // Social settings update.
            $this->social->facebook  = $request->facebook;
            $this->social->twitter   = $request->twitter;
            $this->social->youtube   = $request->youtube;
            $this->social->linkedin  = $request->linkedin;
            $this->social->pinterest = $request->pinterest;
            $this->social->instagram = $request->instagram;
            $this->social->save();

            Track::newTrack('Settings', 'Setting was updated.');

            DB::commit();
            session()->flash('success', 'Settings has been updated successfully.');

            return redirect()->route('admin.settings.index');
        } catch (Exception $e) {
            session()->flash('db_error', $e->getMessage());
            DB::rollBack();
            return back();
        }
    }
}
