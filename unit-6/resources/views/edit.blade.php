<!DOCTYPE html>
<html>

<head>
    <title>Edit</title>
</head>

<body>

    <h1>Edit Student</h1>

    <form action="/update/{{ $student->_id }}" method="POST">

        @csrf

        <input type="text"
            name="name"
            value="{{ $student->name }}">

        <input type="email"
            name="email"
            value="{{ $student->email }}">

        <input type="text"
            name="phone"
            value="{{ $student->phone }}">

        <button type="submit">
            Update
        </button>

    </form>

</body>

</html>