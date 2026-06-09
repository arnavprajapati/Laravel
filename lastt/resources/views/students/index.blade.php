<h2>Student List</h2>

<a href="/students/create">
    Add Student
</a>

<br><br>

<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Age</th>
    <th>Edit</th>
    <th>Delete</th>
</tr>

@foreach($students as $student)

<tr>
    <td>{{ $student->id }}</td>
    <td>{{ $student->name }}</td>
    <td>{{ $student->age }}</td>

    <td>
        <a href="/students/edit/{{ $student->id }}">
            Edit
        </a>
    </td>

    <td>
        <a href="/students/delete/{{ $student->id }}">
            Delete
        </a>
    </td>
</tr>

@endforeach

</table>