<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timeslot;

class TimeslotController extends Controller
{
    //
    public function index()
    {
        $timeslots = Timeslot::all();
        return view('admin.timeslots.index', compact('timeslots'));
    }
    
    public function store(Request $request)
    {
        Timeslot::create($request->only(['day', 'start_time', 'end_time']));
        return redirect()->back()->with('success', 'Timeslot configured.');
    }
}
