<h2>Edit Student</h2>

<form action="/students/update/{{ $student->id }}" method="POST">

    @csrf

    Name :
    <input
        type="text"
        name="name"
        value="{{ $student->name }}"
    >

    <br><br>

    Age :
    <input
        type="number"
        name="age"
        value="{{ $student->age }}"
    >

    <br><br>

    <button type="submit">
        Update
    </button>

</form>