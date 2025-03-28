<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>activities</title>
</head>

<body>
    <h1>List Activities</h1>
    @if ($show_all == true)
        @foreach ($activities as $activity)
            <h1>Activity Name : {{ $activity->name }}</h1>
            @foreach ($activity->employees as $employee)
                <p>
                    {{ $employee->name }}
                </p>
            @endforeach
        @endforeach
    @else
        <h3>
            Activity Name: {{ $activities->name }}
        </h3>
        <ul>
            @foreach ($employees as $employee)
                <li>
                    {{ $employee->name }}
                </li>
            @endforeach
        </ul>
    @endif

</body>

</html>
