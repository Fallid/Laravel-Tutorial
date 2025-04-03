<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee</title>
</head>

<body>
    <form action="{{ route('employee-update', $contact) }}" method="POST">
        @method('patch')
        @csrf
        <input type="text" name="name" value="{{ $contact->employee->name }}"><br>
        <input type="text" name="division" value="{{ $contact->employee->division }}"><br>
        <input type="text" name="position" value="{{ $contact->employee->position }}"><br>
        <input type="text" name="email" value="{{ $contact->email }}"><br>
        <input type="text" name="phone" value="{{ $contact->phone }}"><br>
        <button type="submit">Update</button>
    </form>
</body>

</html>
