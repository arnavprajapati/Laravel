<!DOCTYPE html>
<html>
<head>
    <title>Basic Form Submission</title>
</head>
<body>
    <h2>User Registration Form</h2>

    {{-- Error Block: Displays validation errors if the user makes a mistake --}}
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form Block: The action must match the Route::post URL --}}
    <form action="/submit" method="POST">
        @csrf
        
        <label>Name:</label>
        <input type="text" name="name" placeholder="Enter name"><br><br>

        <label>Email:</label>
        <input type="email" name="email" placeholder="Enter email"><br><br>

        <label>Phone:</label>
        <input type="text" name="phone" placeholder="Enter phone"><br><br>

        <button type="submit">Submit Form</button>
    </form>
</body>
</html>