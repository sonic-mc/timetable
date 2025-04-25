<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timeslot;

class ClassRoomController extends Controller
{
    //
    public function index()
    {
        $timeslot = Timeslot::all();
        return view('admin.timeslot.index', compact('timeslot'));
    }
    
    public function store(Request $request)
    {
        Timeslot::create($request->only(['day', 'start_time', 'end_time']));
        return redirect()->back()->with('success', 'Timeslot configured.');
    }
}
