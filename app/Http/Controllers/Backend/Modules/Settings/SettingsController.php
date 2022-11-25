<?php

namespace App\Http\Controllers\Backend\Modules\Settings;

use App\Helpers\UploadHelper;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Track;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('settings.edit')) {
            return abort(403, 'You are not allowed to access this page.');
        }

        return view('backend.pages.settings.edit', [
            'settings' => Setting::first()
        ]);
    }

    public function update(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('settings.edit')) {
            return abort(403, 'You are not allowed to access this page.');
        }

        $settings = Setting::first();

        if (empty($settings)) {
            return abort(404, 'No settings has been found.');
        }

        $request->validate([
            'name'  => 'required|max:100',
            'address'  => 'required|max:100',
            'footer_text'  => 'required|max:100',
        ]);

        try {
            DB::beginTransaction();
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
