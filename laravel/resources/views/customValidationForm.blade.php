<!DOCTYPE html>
<html>
<head>
    <title>Custom Form Validation</title>
</head>
<body>
    <h2>Advanced Registration Form</h2>

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

    <form action="/validate/submit" method="POST">
        @csrf
        
        <label>Name:</label>
        <input type="text" name="name"><br><br>

        <label>Age (DOB):</label>
        <input type="text" name="dob"><br><br>

        <label>Password:</label>
        <input type="password" name="password"><br><br>
        
        {{-- For the 'confirmed' rule to work, this MUST be named password_confirmation --}}
        <label>Confirm Password:</label>
        <input type="password" name="password_confirmation"><br><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>