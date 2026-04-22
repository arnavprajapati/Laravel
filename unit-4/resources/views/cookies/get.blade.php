<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Get Cookie</title>
</head>

<body>
    <h2>Retrieve City Cookie</h2>

    {{-- b) Check if cookie exists before displaying --}}
    @if ($city)
    <p>City: <strong>{{ $city }}</strong></p>
    @else
    <p>Cookie not found</p>
    @endif

    <a href="{{ route('cookie.set') }}">Set Cookie Again</a>
</body>

</html>