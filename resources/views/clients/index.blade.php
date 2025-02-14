{{-- @extends('layouts.app')

@section('content')
    <h1>Client List</h1>
    <ul>
        @foreach ($clients as $client)
            <li>{{ $client->name }} - {{ $client->email }} - {{ $client->phone }}</li>
        @endforeach
    </ul>
@endsection --}}


<!DOCTYPE html>
<html>
<head>
    <title>Clients List</title>
</head>
<body>
    <h1>Welcome, {{ Auth::user()->name }}!</h1>
    
    <h2>Clients:</h2>
    <ul>
        {{-- @foreach ($clients as $client)
            <li>{{ $client->name }} ({{ $client->email }}) - {{ $client->phone }}</li>
        @endforeach --}}
    </ul>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form> 
</body>
</html>

