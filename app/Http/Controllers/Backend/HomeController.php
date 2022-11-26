<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('backend.pages.dashboard.index');
    }
}
