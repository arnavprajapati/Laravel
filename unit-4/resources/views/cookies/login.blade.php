<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cookie Login</title>
</head>

<body>
    <h2>Login (Cookie-based)</h2>

    @if ($userId)
    <p>Already logged in as User ID: <strong>{{ $userId }}</strong></p>
    <a href="{{ route('cookie.profile') }}">Go to Profile</a> |
    <a href="{{ route('cookie.logout') }}">Logout</a>
    @else
    <form action="{{ route('cookie.login.post') }}" method="POST">
        @csrf
        <label for="user_id">User ID:</label>
        <input type="number" id="user_id" name="user_id" min="1" required>
        <button type="submit">Login</button>
    </form>

    @if ($errors->any())
    <p style="color:red;">{{ $errors->first('user_id') }}</p>
    @endif
    @endif
</body>

</html>