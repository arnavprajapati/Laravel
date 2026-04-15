<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>

<body>

    {{-- Success Message --}}
    @if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ url('/form') }}" method="POST">
        @csrf

        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">

            {{-- Error --}}
            @error('name')
            <p style="color:red;">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}">

            {{-- ✅ Error --}}
            @error('email')
            <p style="color:red;">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label for="phone">Phone:</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone') }}">

            {{-- Error --}}
            @error('phone')
            <p style="color:red;">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <button type="submit">Submit</button>
    </form>

</body>

</html>