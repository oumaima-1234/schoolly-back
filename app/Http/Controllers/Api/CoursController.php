<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cours;
use Illuminate\Http\Request;

class CoursController extends Controller
{
    // جلب جميع الدروس
    public function index() {
        return Cours::all();
    }

    // إنشاء درس جديد مع التحقق من البيانات
    public function store(Request $request) {
        $validated = $request->validate([
            'Code' => 'required|string|max:255|unique:cours',
            'Nom' => 'required|string|max:255',
            'Description' => 'nullable|string',
        ]);

        return Cours::create($validated);
    }

    // جلب درس محدد
    public function show(Cours $cours) {
        return $cours;
    }

    // تحديث درس محدد مع التحقق من البيانات
   
    public function update(Request $request, $id)
{
    $validated = $request->validate([
        'Code' => 'required|string|max:50',
        'Nom' => 'required|string|max:255',
        'Description' => 'nullable|string|max:500',
    ]);

    $course = Cours::findOrFail($id);
    $course->update($validated);

    return response()->json($course);
}


    // حذف درس
    public function destroy(Cours $cours) {
        $cours->delete();
        return response()->noContent();
    }
}
