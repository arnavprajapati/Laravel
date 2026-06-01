<!DOCTYPE html>
<html>

<head>
    <title>Individual Error Messages</title>
</head>

<body>

    <h2>Sign Up (Individual Error Messages)</h2>

    <form action="/error-messages/submit" method="POST">
        @csrf

        <label>Username:</label>
        <input type="text" name="username">

        @if($errors->has('username'))
        <span style="color:red;">
            {{ $errors->first('username') }}
        </span>
        @endif

        <br><br>

        <label>Email:</label>
        <input type="text" name="email">

        @if($errors->has('email'))
        <span style="color:red;">
            {{ $errors->first('email') }}
        </span>
        @endif

        <br><br>

        <button type="submit">Register</button>

    </form>

</body>

</html>