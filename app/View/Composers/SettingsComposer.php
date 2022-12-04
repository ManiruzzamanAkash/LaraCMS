<?php

namespace App\View\Composers;

use App\Settings\ContactSettings;
use App\Settings\GeneralSettings;
use App\Settings\SocialSettings;
use Illuminate\View\View;
use stdClass;

class SettingsComposer
{
    public GeneralSettings $general;
    public ContactSettings $contact;
    public SocialSettings $social;

    public function __construct(GeneralSettings $general, ContactSettings $contact, SocialSettings $social)
    {
        $this->general = $general;
        $this->contact = $contact;
        $this->social = $social;
    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $settings = new stdClass();
        $settings->general = $this->general;
        $settings->contact = $this->contact;
        $settings->social  = $this->social;

        $view->with('settings', $settings);
    }
}
