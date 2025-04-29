<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sample Timetable</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        table {
            text-align: center;
        }
        th, td {
            vertical-align: middle !important;
        }
        th.rotate {
            writing-mode: vertical-rl;
            transform: rotate(180deg);
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Timetable</h2>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Day</th>
                    <th>08:00 - 09:00</th>
                    <th>09:00 - 10:00</th>
                    <th>10:00 - 11:00<br>(Lunch)</th>
                    <th>11:00 - 12:00</th>
                    <th>12:00 - 01:00</th>
                    <th>01:00 - 02:00</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Monday</th>
                    <td>Math</td>
                    <td>English</td>
                    <td rowspan="5">Lunch</td>
                    <td>Science</td>
                    <td>History</td>
                    <td>Geography</td>
                </tr>
                <tr>
                    <th>Tuesday</th>
                    <td>English</td>
                    <td>Math</td>
                    <td>Geography</td>
                    <td>Science</td>
                    <td>History</td>
                </tr>
                <tr>
                    <th>Wednesday</th>
                    <td>Science</td>
                    <td>English</td>
                    <td>Math</td>
                    <td>Geography</td>
                    <td>English</td>
                </tr>
                <tr>
                    <th>Thursday</th>
                    <td>History</td>
                    <td>Science</td>
                    <td>English</td>
                    <td>Math</td>
                    <td>Science</td>
                </tr>
                <tr>
                    <th>Friday</th>
                    <td>Math</td>
                    <td>Geography</td>
                    <td>History</td>
                    <td>English</td>
                    <td>Math</td>
                </tr>
            </tbody>
        </table>
        <div class="text-center mt-4">
            <a href="/" class="btn btn-primary">Back to Home</a>
        </div>
    </div>
</body>
</html>
