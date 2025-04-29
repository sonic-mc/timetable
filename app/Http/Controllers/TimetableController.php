<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timetable;
use App\Models\ClassRoom;
use App\Models\Subject;
use App\Models\Timeslot;
use App\Models\Assignment;
use Illuminate\Support\Facades\DB;

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
    public function generate()
    {
        // Start clean
        DB::beginTransaction();
        
        try {
            // 1. Get all assignments
            $assignments = Assignment::with('subject', 'classRoom')->get();

            // 2. Get all timeslots
            $timeslots = Timeslot::all();

            if ($assignments->isEmpty() || $timeslots->isEmpty()) {
                return back()->with('error', 'No assignments or timeslots found.');
            }

            // 3. Initialize empty timetable array
            $timetable = [
                'Monday' => [],
                'Tuesday' => [],
                'Wednesday' => [],
                'Thursday' => [],
                'Friday' => [],
            ];

            // 4. Loop and generate entries
            foreach ($assignments as $assignment) {
                foreach ($timeslots as $timeslot) {
                    // Safety check
                    if (!isset($timetable[$timeslot->day])) {
                        $timetable[$timeslot->day] = [];
                    }

                    $timetable[$timeslot->day][] = [
                        'class_id' => $assignment->class_id,
                        'subject_id' => $assignment->subject_id,
                        'teacher_id' =>1,
                        'timeslot_id' => $timeslot->id,
                    ];
                }
            }

            // 5. Save the generated timetable into database
            foreach ($timetable as $day => $entries) {
                foreach ($entries as $entry) {
                  
                    Timetable::create([
                        'class_id' => $entry['class_id'],
                        'subject_id' => $entry['subject_id'],
                        // 'timeslot_id' => $entry['timeslot_id'],
                        'teacher_id' => $entry['teacher_id'],
                        'day'=>$day,
                    ]);
                }
            }

            DB::commit();

            return back()->with('success', 'Timetable generated successfully!');
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            return back()->with('error', 'Failed to generate timetable: ' . $e->getMessage());
        }
    }

   
}
