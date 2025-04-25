<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assignment;

class AssignmentController extends Controller
{
    //


public function store(Request $request)
{
    Assignment::create([
        'class_id' => $request->class_id,
        'subject_id' => $request->subject_id,
    ]);
    return redirect()->back()->with('success', 'Subject assigned to class.');
 }
}
