<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EmploiDuTemps;
use Illuminate\Http\Request;

class EmploiController extends Controller
{
    // GET all emploi du temps
    public function index()
    {
        return EmploiDuTemps::with('matiere')->get();
    }
    /*public function index() {
        return EmploiDuTemps::all(); }*/

    // POST create new emploi
    public function store(Request $request)
    {
        $validated = $request->validate([
            'jour' => 'required|string|max:50',
            'heure_debut' => 'required',
            'heure_fin' => 'required',
            //'matiere_id' => 'required|exists:matieres,id',
            'class' => 'nullable|string|max:255',
            'professeur' => 'nullable|string|max:255',
        ]);

        return EmploiDuTemps::create($validated);
    }

    // GET one emploi
    public function show(EmploiDuTemps $emploi)
    {
        return $emploi->load('matiere');
    }

    // PUT update emploi
    public function update(Request $request, EmploiDuTemps $emploi)
    {
        $validated = $request->validate([
            'jour' => 'required|string|max:50',
            'heure_debut' => 'required',
            'heure_fin' => 'required',
            //'matiere_id' => 'required|exists:matieres,id',
            'class' => 'nullable|string|max:255',
            'professeur' => 'nullable|string|max:255',
        ]);

        $emploi->update($validated);

        return $emploi;
    }

    // DELETE emploi
    public function destroy(EmploiDuTemps $emploi)
    {
        $emploi->delete();

        return response()->noContent();
    }
}
