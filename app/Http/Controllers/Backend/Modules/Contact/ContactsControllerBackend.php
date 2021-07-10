<?php

namespace App\Http\Controllers\Backend\Modules\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class ContactsControllerBackend extends Controller
{

    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('web')->user();
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($isTrashed = false)
    {

        if ( is_null($this->user) || ! $this->user->can('contact.view') ) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        if (request()->ajax()) {
            $contacts = Contact::orderBy('id', 'desc')->get();

            $datatable = DataTables::of($contacts, $isTrashed)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($row) use ($isTrashed) {
                        return "";
                    }
                )

                ->editColumn('status', function ($row) {
                    if ($row->status) {
                        return '<span class="badge badge-success font-weight-100">Viewed</span>';
                    } else {
                        return '<span class="badge badge-warning">Not Viewed</span>';
                    }
                });
            $rawColumns = ['action', 'name', 'email', 'phone', 'country', 'company', 'subject', 'message', 'status'];
            return $datatable->rawColumns($rawColumns)
                ->make(true);
        }

        $count_contacts = Contact::count();
       return view('backend.pages.contacts.index', compact('count_contacts'));
    }
}
