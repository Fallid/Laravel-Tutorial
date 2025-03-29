<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $contact->employee->name }}</title>
</head>

<body>
    <h4>Name : <span style="font-weight:normal">{{ $contact->employee->name }}</span></h4>
    <h4>Devision : <span style="font-weight:normal">{{ $contact->employee->division }}</span></h4>
    <h4>Position : <span style="font-weight:normal">{{ $contact->employee->position }}</span></h4>
    <h4>Hire Date : <span style="font-weight:normal">{{ $contact->employee->created_at }}</span></h4>
    <h4>Email : <span style="font-weight:normal">{{ $contact->email }}</span></h4>
    <h4>Phone Number: <span style="font-weight:normal">{{ $contact->phone }}</span></h4>

</body>

</html>
