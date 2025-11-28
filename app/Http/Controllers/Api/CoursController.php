<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cours;
use Illuminate\Http\Request;

class CoursController extends Controller
{
    public function index()
    {
        return Cours::all();
    }

    public function store(Request $request)
    {
        $cours = Cours::create($request->all());
        return response()->json($cours, 201);
    }

    public function show($id)
    {
        return Cours::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $cours = Cours::findOrFail($id);
        $cours->update($request->all());
        return response()->json($cours);
    }

    public function destroy($id)
    {
        Cours::destroy($id);
        return response()->json(null, 204);
    }
}
