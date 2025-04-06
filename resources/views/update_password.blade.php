<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>

<body>
    <form action="{{ route('home') }}" method="get">
        @csrf
        <button type="submit">HOME</button>
    </form>
    <h1>{{ $user->name }}</h1>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach

    @endif
    @if (Session::has('Authentication'))
        <p> {{ Session::get('Authentication') }}</p>
    @endif
    <form action="{{ route('user_store_password') }}" method="post">
        @method('patch')
        @csrf
        <input type="password" name="new_password" placeholder="new password">
        <input type="password" name="new_password_confirmation" placeholder="confirm new password">
        <button type="submit">Update Pass</button>
    </form>
</body>

</html>
