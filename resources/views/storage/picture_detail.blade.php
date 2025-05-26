<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Picture {{ $picture->name }}</title>
</head>

<body>
    <p>Name : {{ $picture->name }}</p> <br>
    <p>Path : {{ $picture->path }}</p>
    <img src="{{ $url }}" alt="broken" height="200px">

    <form action="{{ route('picture.delete', $picture) }}" method="post">
        @method('delete')
        @csrf
        <button type="submit">Delete</button>
    </form>
</body>

</html>
