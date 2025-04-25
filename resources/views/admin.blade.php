<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Timetable Configuration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-4">School Timetable Configuration</h2>

        <!-- Add/Edit Teachers -->
        <div class="card mb-4">
            <div class="card-header">Add / Edit Teacher</div>
            <div class="card-body">
                <form action="Route::resource('teachers', TeacherController::class)" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="">
                    <div class="form-group">
                        <label for="teacher_name">Name</label>
                        <input type="text" name="name" class="form-control" required>
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
                        <form action="Route::resource('teachers', ClassRoomController::class)" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
                        <form action="Route::resource('teachers', SubjectController::class)" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
                <form action="Route::resource('teachers', AssignmentController::class)" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="class_id">Select Class</label>
                        <select name="class_id" class="form-control" required>
                            <!-- Add your dynamic options here -->
                            <option value="1">Class 1</option>
                            <option value="2">Class 2</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="subject_id">Select Subject</label>
                        <select name="subject_id" class="form-control" required>
                            <!-- Add your dynamic options here -->
                            <option value="1">Math</option>
                            <option value="2">Science</option>
                            <option value="3">English</option>
                            <option value="4">Geography</option>
                            <option value="5">History</option>
                            <option value="6">Economics</option>
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
                <form action="Route::resource('teachers', TimeslotController::class)" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
