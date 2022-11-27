<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class ContactsController extends Controller
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
    public function index($isTrashed = false)
    {
        if (is_null($this->user) || !$this->user->can('contact.view')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $query = Contact::orderBy('status', 'asc')
            ->orderBy('id', 'desc');

        if (request()->ajax()) {
            $contacts = $query->get();

            $contactsDataTable = DataTables::of($contacts, $isTrashed)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($row) use ($isTrashed) {
                        $html = '<a class="btn waves-effect waves-light btn-info btn-sm btn-circle" title="View Contact Details" href="' . route('admin.contacts.show', $row->id) . '"><i class="fa fa-eye"></i></a>';
                        return $html;
                    }
                )

                ->editColumn('status', function ($row) {
                    if ($row->status) {
                        return '<span class="badge badge-success font-weight-100">Viewed</span>';
                    } else {
                        return '<span class="badge badge-warning">Not Viewed</span>';
                    }
                });

            $rawColumns = ['action', 'email', 'message', 'status'];
            return $contactsDataTable->rawColumns($rawColumns)
                ->make(true);
        }

        return view('backend.pages.contacts.index', [
            'total_messages' => $query->count()
        ]);
    }

    public function show(Contact $contact): Renderable
    {
        // Make status as viewed.
        $contact->status = 1;
        $contact->admin_id = $this->user->id;
        $contact->save();

        // Show contact.
        return view('backend.pages.contacts.show', compact('contact'));
    }
}
