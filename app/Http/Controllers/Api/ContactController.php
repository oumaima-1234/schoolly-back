<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // جلب جميع جهات الاتصال
    public function index() {
        return Contact::all();
    }

    // إنشاء جهة اتصال جديدة مع التحقق من البيانات
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:contacts',
            'sujet' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        return Contact::create($validated);
    }

    // جلب جهة اتصال محددة
    public function show(Contact $contact) {
        return $contact;
    }

    // تحديث جهة اتصال محددة
    public function update(Request $request, Contact $contact) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:contacts,email,' . $contact->id,
            'sujet' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $contact->update($validated);
        return $contact;
    }

    // حذف جهة اتصال
    public function destroy(Contact $contact) {
        $contact->delete();
        return response()->noContent();
    }
}
