<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Professeur;
use Illuminate\Http\Request;

class ProfesseurController extends Controller
{
    public function index()
    {
        return Professeur::all();
    }

    public function store(Request $request)
    {
        $professeur = Professeur::create($request->all());
        return response()->json($professeur, 201);
    }

    public function show($id)
    {
        return Professeur::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $professeur = Professeur::findOrFail($id);
        $professeur->update($request->all());
        return response()->json($professeur);
    }

    public function destroy($id)
    {
        Professeur::destroy($id);
        return response()->json(null, 204);
    }
}
