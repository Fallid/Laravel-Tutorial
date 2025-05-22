<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee</title>
</head>

<body>
    <p>
        {{ __('Language') }}: {{ App::getLocale() }}
    </p>
    <form action="{{ route('set_locale', 'en') }}" method="get">
        <button type="submit">
            {{ __('English') }}
        </button>
    </form>
    <form action="{{ route('set_locale', 'id') }}" method="get">
        <button type="submit">
            {{ __('Indonesian') }}
        </button>
    </form>
    @if (Auth::check())
        <p>
            {{ __('Your Role') }}:
            @foreach (Auth::user()->roles as $role)
                <br> {{ $role->role }}
            @endforeach
        </p>
        <form action="{{ route('logout') }}" method="post">@csrf
            <button type="submit">{{ __('Logout') }}</button>
        </form>
        <h1>{{ __('Welcome') }} {{ $user->name }}</h1>
        <h3>{{ $user->email }}</h3>
    @else
        <form action="{{ route('register') }}" method="get">@csrf
            <button type="submit"> {{ __('Register') }} </button>
        </form>
        <form action="{{ route('login') }}" method="get">@csrf
            <button type="submit"> {{ __('Login') }} </button>
        </form>
    @endif
    <h1>{{ __('List of Emplyee') }}</h1>
    <table border="1px">
        <thead>
            <tr>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Email') }}</th>
                <th>{{ __('Division') }}</th>
                <th>{{ __('Action') }}</th>
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
                                type="submit">{{ __('Update') }}</button> </form>
                        <form action="{{ route('employee-delete', $contact) }}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit">{{ __('Delete') }}</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- Method yang bisa digunakan untuk pagination --}}
    <p>{{ __('Current Page') }} : {{ $employees->currentPage() }}</p>
    <p>{{ __('Total Data') }} : {{ $employees->total() }}</p>
    <p>{{ __('Data per Page') }}: {{ $employees->perPage() }}</p>
    <a href="{{ route('employee-create') }}">{{ __('Create new employee') }}</a>

    {{ $employees->links('pagination::simple-tailwind') }}

</body>

</html>
