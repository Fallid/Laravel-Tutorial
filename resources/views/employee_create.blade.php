<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Create</title>
</head>

<body>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif
    {{-- csrf for secure the data --}}
    <form action="{{ route('employee-store') }}" method="post">
        @csrf
        <input type="text" name="name" id="name" placeholder="Input Name"><br>
        <input type="text" name="division" id="division" placeholder="Input Division"><br>
        <input type="text" name="position" id="position" placeholder="Input Position"><br>
        <input type="email" name="email" id="email" placeholder="Input Email"><br>
        <input type="number" name="phone" id="phone" placeholder="Input Phone"><br>
        <button type="submit">Submit</button>
    </form>

</body>

</html>
