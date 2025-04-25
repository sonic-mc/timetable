<table class="table table-bordered">
    <thead>
        <tr>
            <th>Class</th>
            <th>Monday</th>
            <th>Tuesday</th>
            <th>Wednesday</th>
            <th>Thursday</th>
            <th>Friday</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($timetable as $class => $days)
        <tr>
            <td>{{ $class }}</td>
            @foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'] as $day)
            <td>
                @foreach ($days[$day] as $timeslot)
                    <p>{{ $timeslot['subject'] }}<br>{{ $timeslot['start_time'] }} - {{ $timeslot['end_time'] }}</p>
                @endforeach
            </td>
            @endforeach
        </tr>
        @endforeach
    </tbody>
</table>
