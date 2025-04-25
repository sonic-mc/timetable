<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timetable;
use App\Models\ClassRoom;
use App\Models\Subject;
use App\Models\Timeslot;
use App\Models\Assignment;

class TimetableController extends Controller
{
    public function index()
    {
        $timetables = Timetable::with(['class', 'subject', 'timeslot'])->get();
        return view('admin.timetables.index', compact('timetables'));
    }

    public function create()
    {
        $classes = ClassRoom::all();
        $subjects = Subject::all();
        $timeslots = Timeslot::all();

        return view('admin.timetables.create', compact('classes', 'subjects', 'timeslots'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'class_id' => 'required|exists:school_classes,id',
            'subject_id' => 'required|exists:subjects,id',
            'timeslot_id' => 'required|exists:timeslots,id',
        ]);

        Timetable::create([
            'class_id' => $request->class_id,
            'subject_id' => $request->subject_id,
            'timeslot_id' => $request->timeslot_id,
        ]);

        return redirect()->route('timetables.index')->with('success', 'Timetable entry added.');
    }

    public function destroy($id)
    {
        Timetable::destroy($id);
        return redirect()->back()->with('success', 'Entry deleted.');
    }
    public function generateTimetable()
    {
        $timeslots = Timeslot::all();
        $classes = ClassRoom::all();
        $assignments = Assignment::with(['subject', 'classroom'])->get();
    
        // Create a timetable array based on classes, timeslots, and assignments
        $timetable = [];
        foreach ($classes as $class) {
            foreach ($timeslots as $timeslot) {
                $timetable[$class->name][$timeslot->day][] = [
                    'subject' => $assignments->firstWhere('class_id', $class->id)->subject->name ?? 'Free',
                    'start_time' => $timeslot->start_time,
                    'end_time' => $timeslot->end_time,
                ];
            }
        }
    
        return view('timetable', compact('timetable'));
    }
}

