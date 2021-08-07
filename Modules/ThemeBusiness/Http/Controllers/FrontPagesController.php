<?php

namespace Modules\ThemeBusiness\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Service\Entities\Service;

class FrontPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('themebusiness::frontend.pages.index');
    }

    public function price()
    {
        return view('themebusiness::frontend.pages.price');
    }

    public function blog()
    {
        return view('themebusiness::frontend.pages.blog');
    }

    public function portfolio()
    {
        return view('themebusiness::frontend.pages.portfolio');
    }

    public function about()
    {
        return view('themebusiness::frontend.pages.about');
    }

    public function contact()
    {
        return view('themebusiness::frontend.pages.contact');
    }
}
