<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return Contact::latest()->orderBy('created_at', 'desc')->get();
    }

    public function show($id)
    {
        return Contact::findOrFail($id);
    }

    public function store(Request $request)
    {
        Contact::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone')
        ]);
    }

    public function update($id, Request $request)
    {
        $contact = Contact::findOrFail($id);

        $contact->name = $request->input('name');
        $contact->name = $request->input('email');
        $contact->name = $request->input('phone');

        $contact->save();
    }

    public function delete($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
    }

}
