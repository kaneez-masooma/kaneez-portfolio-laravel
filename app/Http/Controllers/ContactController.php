<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    /**
     * Store a new contact message.
     * $request is already validated automatically because of the
     * ContactFormRequest type-hint -- if validation fails, Laravel
     * redirects back with errors before this code even runs.
     */
    public function store(ContactFormRequest $request)
    {
        ContactMessage::create($request->validated());

        return back()->with('success', 'Thanks for reaching out! I\'ll get back to you soon.');
    }
}
