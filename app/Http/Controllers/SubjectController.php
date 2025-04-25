<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    //
    public function index()
    {
        $subjects = Subject::all();
        return view('admin.subjects.index', compact('subjects'));
    }
    
    public function store(Request $request)
    {
        Subject::create([
            'name' => $request->name,
            'code' => $request->code,
        ]);
        return redirect()->back()->with('success', 'Subject added.');
    }
}
