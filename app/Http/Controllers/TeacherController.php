<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    //
    public function index()
    {
        $teachers = Teacher::all();
        return view('admin.teachers.index', compact('teachers'));
    }

    public function store(Request $request)
    {
        Teacher::create(
             ['name' => $request->name]
        );
        return redirect()->back()->with('success', 'Teacher saved successfully.');
    }
}
