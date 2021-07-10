<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontPagesController extends Controller
{
    /**
     * homePage
     *
     * HomePage of Application
     *
     * @return void
     */
    public function index()
    {
        return view('frontend.pages.index');
    }
}
