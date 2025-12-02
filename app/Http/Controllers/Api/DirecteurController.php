<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Directeur;
use Illuminate\Http\Request;

class DirecteurController extends Controller
{
    // جلب جميع المدراء
    public function index() {
        return Directeur::all();
    }

    // إنشاء مدير جديد مع التحقق من البيانات
    public function store(Request $request) {
        $validated = $request->validate([
            'Nom' => 'required|string|max:255',
            'Prenom' => 'required|string|max:255',
        ]);

        return Directeur::create($validated);
    }

    // جلب مدير محدد
    public function show(Directeur $directeur) {
        return $directeur;
    }

    // تحديث مدير محدد
    public function update(Request $request, Directeur $directeur) {
        $validated = $request->validate([
            'Nom' => 'required|string|max:255',
            'Prenom' => 'required|string|max:255',
        ]);

        $directeur->update($validated);
        return $directeur;
    }

    // حذف مدير
    public function destroy(Directeur $directeur) {
        $directeur->delete();
        return response()->noContent();
    }
}

