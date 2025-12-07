<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\ContactReply;
use Illuminate\Http\Request;

class ContactReplyController extends Controller
{
    
    public function store(Request $request, $contactId)
    {
        $request->validate([
            'message' => 'required|string|max:5000',
        ]);

        $contact = Contact::findOrFail($contactId);

        $reply = ContactReply::create([
            'contact_id' => $contact->id,
            // 'replied_by' => auth()->user()->name ?? "Directeur",
            'replied_by' => auth()->name ?? "Directeur",
            'message' => $request->message,
        ]);

        return response()->json($reply, 201);
    }

    public function getReplies($contactId)
    {
        $replies = ContactReply::where('contact_id', $contactId)->get();

        return response()->json($replies);
    }
}
