<!DOCTYPE html>
<html>
<head>
    <title>Repopulating Forms (Old Input)</title>
</head>
<body>
    <h2>Registration Form (With Old Input)</h2>

    {{-- Show Validation Errors --}}
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/old-input/submit" method="POST">
        @csrf
        
        <label>Username:</label>
        {{-- Notice the value attribute using the old() helper --}}
        <input type="text" name="username" value="{{ old('username') }}">
        <br><br>

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}">
        <br><br>

        <label>Age (Must be 18+):</label>
        <input type="text" name="age" value="{{ old('age') }}">
        <br><br>

        <button type="submit">Register</button>
    </form>
</body>
</html>