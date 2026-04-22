<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome Cookie</title>
</head>

<body>
    <h2>Welcome Cookie Demo</h2>

    {{-- d) Display welcome message if cookie exists --}}
    @if ($name)
    <h3>Welcome, {{ $name }}!</h3>
    @endif

    <form action="{{ route('cookie.welcome.store') }}" method="POST">
        @csrf
        <label for="name">Enter your name:</label>
        <input type="text" id="name" name="name" required>
        <button type="submit">Submit</button>
    </form>

    @if ($errors->any())
    <p style="color:red;">{{ $errors->first('name') }}</p>
    @endif
</body>

</html>