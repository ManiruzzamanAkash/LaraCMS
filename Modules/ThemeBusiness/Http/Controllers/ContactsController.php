<?php

namespace Modules\ThemeBusiness\Http\Controllers;

use Exception;
use App\Models\Contact;
use App\Mail\ContactSent;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Log;
use Modules\ThemeBusiness\Http\Requests\ContactRequest;

class ContactsController extends Controller
{
    public function index(): Renderable
    {
        return view('themebusiness::frontend.pages.contact');
    }

    public function store(ContactRequest $request)
    {
        $contact          = new Contact();
        $contact->name    = $request->name;
        $contact->email   = $request->email;
        $contact->phone   = $request->phone;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->status  = 0;
        $contact->save();
        session()->flash('success', 'Your message has been sent to admin. Please wait until they reply back soon.');

        // After that tries to send an email to admin email.
        try {
            Mail::to('manirujjamanakash@gmail.com')->send(new ContactSent($contact));
        } catch (Exception $e) {
            Log::debug('Something went wrong when sending email. Error' . $e->getMessage());
        }

        return back();
    }
}
