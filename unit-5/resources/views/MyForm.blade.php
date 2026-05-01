<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="/submit">
        @csrf
        <input name="name" type="text" placeholder="Enter you name">
        @if ($errors->has('name'))
        <div style="color: red;">
            {{ $errors->first('name') }}
        </div>
        @endif
        <input type="text" name="email" placeholder="Enter your email">
        @if ($errors->has('email'))
        <div style="color: red;">
            {{ $errors->first('email') }}
        </div>
        @endif
        <button type="submit">Submit</button>
    </form>
</body>

</html>