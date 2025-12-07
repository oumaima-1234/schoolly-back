<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Response;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Liste toutes les réclamations avec leurs réponses
    public function index()
    {
        return Contact::all();
    }

    // Créer une réclamation
   public function store(Request $req)
{
    $data = $req->validate([
        'sujet'=>'required',
        'message'=>'required'
    ]);
    $data['user_id'] = $req->user()->id;
    $data['name'] = $req->user()->name;
    $data['email'] = $req->user()->email;
    $contact = Contact::create($data);
    return response()->json($contact, 201);
}

    // Ajouter une réponse pour une réclamation
    public function respond(Request $request, $contact_id)
    {
        $contact = Contact::findOrFail($contact_id);

        $validated = $request->validate([
            'replied_by' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $response = $contact->responses()->create($validated);

        return response()->json($response);
    }
}
