<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee</title>
</head>

<body>
    <h1>List of Emplyee</h1>
    <table border="1px">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Division</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
                <tr>
                    <td> <a href="{{ route('employee-detail', $contact->id) }}">{{ $contact->employee->name }}</a>
                    </td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->employee->division }}</td>
                    <td>
                        <form action="{{ route('employee-edit', $contact) }}" method="get">@csrf <button
                                type="submit">Update</button> </form>
                        <form action="{{ route('employee-delete', $contact) }}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- Method yang bisa digunakan untuk pagination --}}
    <p>Current Page : {{ $employees->currentPage() }}</p>
    <p>Total Data : {{ $employees->total() }}</p>
    <p>Data per Page: {{ $employees->perPage() }}</p>
    <a href="{{ route('employee-create') }}">Create new employee</a>

    {{ $employees->links('pagination::simple-tailwind') }}

</body>

</html>
