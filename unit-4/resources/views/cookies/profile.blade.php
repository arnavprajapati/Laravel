<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Profile</title>
</head>

<body>
    <h2>Profile</h2>

    @if ($userId)
    <p>Logged in as User ID: <strong>{{ $userId }}</strong></p>
    <a href="{{ route('cookie.logout') }}">Logout</a>
    @else
    <p>You are not logged in.</p>
    <a href="{{ route('cookie.login') }}">Login</a>
    @endif
</body>

</html>