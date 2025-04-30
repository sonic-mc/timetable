<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>School Timetable</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        table {
            text-align: center;
            table-layout: fixed;
            width: 100%;
        }
        th, td {
            vertical-align: middle !important;
            height: 60px;
        }
        th.rotate {
            writing-mode: vertical-rl;
            transform: rotate(180deg);
        }
        .lunch-cell {
            background-color: #fff3cd !important;
            font-weight: bold;
        }
        .free-period {
            color: #6c757d;
            font-style: italic;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">School Timetable</h2>
    
    @if(empty($timetable))
        <div class="alert alert-warning">
            No timetable data available. Please generate the timetable first.
        </div>
    @else
        <table class="table table-bordered">
            <thead class="table-dark">
            <tr>
                <th scope="col" style="width: 15%">Day/Time</th>
                @foreach ($slots as $slot)
                    <th scope="col">{{ $slot }}</th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            @foreach ($days as $day)
                <tr>
                    <th scope="row" class="table-secondary">{{ $day }}</th>
                    @foreach ($slots as $slot)
                        @if ($slot === '10:00 - 11:00')
                            @if ($loop->first)
                                <td class="lunch-cell align-middle" rowspan="{{ count($days) }}">
                                    LUNCH<br>(10:00-11:00)
                                </td>
                            @endif
                        @else
                            @php
                                $subject = $timetable[$day][$slot] ?? null;
                                $isFreePeriod = empty($subject);
                            @endphp
                            <td class="{{ $isFreePeriod ? 'free-period' : '' }}">
                                {{ $subject ?? 'Free' }}
                            </td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif

    <div class="text-center mt-4">
        <a href="/" class="btn btn-outline-secondary">
            Back to Home
        </a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>