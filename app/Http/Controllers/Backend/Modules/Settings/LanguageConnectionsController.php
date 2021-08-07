<?php

namespace App\Http\Controllers\Backend\Modules\Settings;

use App\Models\Language;
use App\Models\LanguageConnection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LanguageConnectionsController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function index()
    {
        if (is_null($this->user) || !$this->user->can('language.connections')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        // language.connections
        $languages = Language::orderBy('code', 'asc')->get();

        // Connections
        $connections = LanguageConnection::get_connections();

        return view('backend.pages.languages.connections', compact('languages', 'connections'));
    }

    public function update(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('language.connections')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        if($request->connections) {
            // Truncate table
            LanguageConnection::truncate();

            $data = [];
            foreach ($request->connections as $lang1 => $lang1_connections) {
                foreach ($lang1_connections as $lang2 => $total) {
                    if( !empty($total)) {
                        $lang_data = [
                            'lang1' => $lang1,
                            'lang2' => $lang2,
                            'total' => $total
                        ];

                        array_push($data, $lang_data);
                    }
                }
            }

            // Insert now
            LanguageConnection::insert($data);
        }

        session()->flash('success', 'Language Connections updated !');
        return back();
    }
}
