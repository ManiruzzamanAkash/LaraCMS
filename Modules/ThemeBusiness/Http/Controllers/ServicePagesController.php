<?php

namespace Modules\ThemeBusiness\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Service\Entities\Service;

class ServicePagesController extends Controller
{
    public function index()
    {
        return view('themebusiness::frontend.pages.service.index');
    }

    public function show($slug)
    {
        $service = Service::where('slug', $slug)->first();
        return view('themebusiness::frontend.pages.service.show', compact('service'));
    }
}
