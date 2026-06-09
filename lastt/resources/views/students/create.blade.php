<h2>Add Student</h2>

<form action="/students/store" method="POST">
    @csrf

    Name :
    <input type="text" name="name">

    <br><br>

    Age :
    <input type="number" name="age">

    <br><br>

    <button type="submit">
        Save
    </button>
</form>