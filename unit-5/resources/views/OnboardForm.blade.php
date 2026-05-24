<!DOCTYPE html>
<html>

<head>
    <title>Employee Onboarding</title>
</head>

<body>
    <h2>Employee Onboarding Form</h2>
    <form method="POST" action="{{ route('onboard.submit') }}">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" value="{{ old('name') }}">
        @if ($errors->has('name'))
        <div style="color:red">{{ $errors->first('name') }}</div>
        @endif
        <br>
        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}">
        @if ($errors->has('email'))
        <div style="color:red">{{ $errors->first('email') }}</div>
        @endif
        <br>
        <label>Password:</label>
        <input type="password" name="password">
        @if ($errors->has('password'))
        <div style="color:red">{{ $errors->first('password') }}</div>
        @endif
        <br>
        <label>Confirm Password:</label>
        <input type="password" name="password_confirmation">
        <br>
        <label>Phone Number:</label>
        <input type="text" name="phone" value="{{ old('phone') }}">
        @if ($errors->has('phone'))
        <div style="color:red">{{ $errors->first('phone') }}</div>
        @endif
        <br>
        <label>Date of Birth:</label>
        <input type="date" name="dob" value="{{ old('dob') }}">
        @if ($errors->has('dob'))
        <div style="color:red">{{ $errors->first('dob') }}</div>
        @endif
        <br>
        <button type="submit">Submit</button>
    </form>
</body>

</html>