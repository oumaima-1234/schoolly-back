<?php

namespace App\Http\Controllers\Api;
use App\Models\Announcement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
     public function index() {
        $announcements = Announcement::orderBy('created_at', 'desc')->get();
        return response()->json($announcements);
    }

    // Créer une annonce
    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'created_by' => 'required|integer',
        ]);

        $announcement = Announcement::create($request->all());
        return response()->json($announcement, 201);
    }


      public function update(Request $request, $id)
{
    $validated = $request->validate([
         'title' => 'required|string|max:255',
            'message' => 'required|string',
            'created_by' => 'required|integer',
    ]);

    $annonce = Announcement::findOrFail($id);
    $annonce->update($validated);

    return response()->json($annonce);
}
  

    // Supprimer une annonce
    public function destroy($id) {
        $announcement = Announcement::findOrFail($id);
        $announcement->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
