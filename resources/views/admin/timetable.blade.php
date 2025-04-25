@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">School Timetable Configuration</h2>

    <!-- Add/Edit Teachers -->
    <div class="card mb-4">
        <div class="card-header">Add / Edit Teacher</div>
        <div class="card-body">
            <form action="{{ route('teachers.store') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ old('id') }}">
                <div class="form-group">
                    <label for="teacher_name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Save Teacher</button>
            </form>
        </div>
    </div>

    <!-- Add Classes & Subjects -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Add Class</div>
                <div class="card-body">
                    <form action="{{ route('classes.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="class_name">Class Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success mt-2">Add Class</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Add Subject</div>
                <div class="card-body">
                    <form action="{{ route('subjects.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="subject_name">Subject Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="subject_code">Code</label>
                            <input type="text" name="code" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-warning mt-2">Add Subject</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Assign Subject to Class -->
    <div class="card mb-4">
        <div class="card-header">Assign Subjects to Classes</div>
        <div class="card-body">
            <form action="{{ route('assignments.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="class_id">Select Class</label>
                    <select name="class_id" class="form-control" required>
                        @foreach($classes as $class)
                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mt-2">
                    <label for="subject_id">Select Subject</label>
                    <select name="subject_id" class="form-control" required>
                        @foreach($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-info mt-2">Assign</button>
            </form>
        </div>
    </div>

    <!-- Configure Timeslots -->
    <div class="card mb-4">
        <div class="card-header">Configure Available Timeslots</div>
        <div class="card-body">
            <form action="{{ route('timeslots.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="day">Day</label>
                    <select name="day" class="form-control" required>
                        <option>Monday</option>
                        <option>Tuesday</option>
                        <option>Wednesday</option>
                        <option>Thursday</option>
                        <option>Friday</option>
                    </select>
                </div>
                <div class="form-group mt-2">
                    <label for="start_time">Start Time</label>
                    <input type="time" name="start_time" class="form-control" required>
                </div>
                <div class="form-group mt-2">
                    <label for="end_time">End Time</label>
                    <input type="time" name="end_time" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-dark mt-2">Add Timeslot</button>
            </form>
        </div>
    </div>
</div>
@endsection
