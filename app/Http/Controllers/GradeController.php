<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grade;

class GradeController extends Controller
{
    // Liste des notes
    public function index()
    {
        return response()->json(Grade::all(), 200);
    }

    // Créer une note
    public function store(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'student_id' => 'required|exists:etudiants,id',
            'subject'    => 'required|string|max:255',
            'teacher'    => 'required|string|max:255',
            'grade'      => 'required|numeric|min:0|max:20', // Si ton barème est /20
        ]);

        // Conversion en float pour être sûr
        $validated['grade'] = floatval($validated['grade']);

        // Création de la note
        $grade = Grade::create($validated);

        return response()->json($grade, 201);
    }

    // Mettre à jour une note
    public function update(Request $request, $id)
    {
        $grade = Grade::findOrFail($id);

        $validated = $request->validate([
            'student_id' => 'required|exists:etudiants,id',
            'subject'    => 'required|string|max:255',
            'teacher'    => 'required|string|max:255',
            'grade'      => 'required|numeric|min:0|max:20',
        ]);

        $validated['grade'] = floatval($validated['grade']);

        $grade->update($validated);

        return response()->json($grade, 200);
    }

    public function show( $id)
    {
        $grade = Grade::findOrFail($id);
        return response()->json($grade, 200);
    }

    // Supprimer une note
    public function destroy($id)
    {
        $grade = Grade::findOrFail($id);
        $grade->delete();
        return response()->json(null, 204);
    }
}
