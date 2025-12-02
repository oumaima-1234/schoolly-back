<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Professeur;
use Illuminate\Http\Request;

class ProfesseurController extends Controller
{
    // جلب جميع الأساتذة
    public function index() {
        return Professeur::all();
    }

    // إنشاء أستاذ جديد مع التحقق من البيانات
    public function store(Request $request) {
        $validated = $request->validate([
            'Name' => 'required|string|max:255',
            'Email' => 'required|string|email|max:255|unique:professeurs',
            'Salary' => 'required|numeric',
            'Experience' => 'required|integer',
            'Department' => 'required|string|max:255',
            'Subject' => 'required|string|max:255',
        ]);

        return Professeur::create($validated);
    }

    // جلب أستاذ محدد
    public function show(Professeur $professeur) {
        return $professeur;
    }

    // تحديث أستاذ محدد مع التحقق من البيانات
    public function update(Request $request, Professeur $professeur) {
        $validated = $request->validate([
            'Name' => 'required|string|max:255',
            'Email' => 'required|string|email|max:255|unique:professeurs,Email,' . $professeur->id,
            'Salary' => 'required|numeric',
            'Experience' => 'required|integer',
            'Department' => 'required|string|max:255',
            'Subject' => 'required|string|max:255',
        ]);

        $professeur->update($validated);
        return $professeur;
    }

    // حذف أستاذ
    public function destroy(Professeur $professeur) {
        $professeur->delete();
        return response()->noContent();
    }
}
