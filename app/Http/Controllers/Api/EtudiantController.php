<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    // جلب جميع الطلاب
    public function index() {
        return Etudiant::all();
    }

    // إنشاء طالب جديد مع التحقق من البيانات
    public function store(Request $request) {
        $validated = $request->validate([
            'Nom' => 'required|string|max:255',
            'Prenom' => 'required|string|max:255',
            'Grade' => 'required|string|max:255',
            'Class' => 'required|string|max:255',
            'GPA' => 'required|numeric',
            'Attendance' => 'required|integer',
        ]);
        

        return Etudiant::create($validated);
    }

    // جلب طالب محدد
    public function show(Etudiant $etudiant) {
        return $etudiant;
    }

    // تحديث طالب محدد مع التحقق من البيانات
    public function update(Request $request, Etudiant $etudiant) {
        $validated = $request->validate([
            'Nom' => 'required|string|max:255',
            'Prenom' => 'required|string|max:255',
            'Grade' => 'required|string|max:255',
            'Class' => 'required|string|max:255',
            'GPA' => 'required|numeric',
            'Attendance' => 'required|integer',
        ]);
        
        $etudiant->update($validated);
        return $etudiant;
    }

    // حذف طالب
    public function destroy(Etudiant $etudiant) {
        $etudiant->delete();
        return response()->noContent();
    }
}
