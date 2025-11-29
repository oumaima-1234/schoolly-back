<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Directeur;
use Illuminate\Http\Request;

class DirecteurController extends Controller
{
    public function index()
    {
        return Directeur::all();
    }

    public function store(Request $request)
    {
        $directeur = Directeur::create($request->all());
        return response()->json($directeur, 201);
    }

    public function show($id)
    {
        return Directeur::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $directeur = Directeur::findOrFail($id);
        $directeur->update($request->all());
        return response()->json($directeur);
    }

    public function destroy($id)
    {
        Directeur::destroy($id);
        return response()->json(null, 204);
    }
}
