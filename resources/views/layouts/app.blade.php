<!DOCTYPE html>
<html>
<head>
    <title>Multi-DB Laravel App</title>
</head>
<body>
    <nav>
        <a href="{{ route('clients.index') }}">Clients</a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </nav>

    <div>
        @yield('content')
    </div>
</body>
</html>
