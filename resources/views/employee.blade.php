<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee</title>
</head>

<body>
    <h1>Contact Person</h1>
    @if ($show_all == true)
        @foreach ($contact_all as $item)
            <h4> {{ $item->id }}. {{ $item->employee->name }} <br><span style="font-weight:normal">Email:
                    {{ $item->email }}</span> <br> <span style="font-weight:normal">Phone Number: {{ $item->phone }}
                </span> </h4>
        @endforeach
        {{-- <h4>{{ $contact_all }}</h4> --}}
    @else
        <h4>Name : <span style="font-weight:normal">{{ $contact->employee->name }}</span></h4>
        <h4>Devision : <span style="font-weight:normal">{{ $contact->employee->division }}</span></h4>
        <h4>Position : <span style="font-weight:normal">{{ $contact->employee->position }}</span></h4>
        <h4>Hire Date : <span style="font-weight:normal">{{ $contact->employee->created_at }}</span></h4>
        <h4>Email : <span style="font-weight:normal">{{ $contact->email }}</span></h4>
        <h4>Phone Number: <span style="font-weight:normal">{{ $contact->phone }}</span></h4>
    @endif
</body>

</html>
