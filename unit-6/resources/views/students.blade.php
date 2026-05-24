<!DOCTYPE html>
<html>

<head>

    <title>Mongo CRUD</title>

    <style>
        body {
            background: #0f172a;
            color: white;
            font-family: Arial;
            padding: 40px;
        }

        input {
            padding: 10px;
            margin: 5px;
        }

        button {
            padding: 10px;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid white;
            padding: 10px;
        }

        .error {
            color: red;
        }
    </style>

</head>

<body>

    <h1>Laravel MongoDB CRUD</h1>

    @if(session('success'))

    <p style="color:lightgreen">
        {{ session('success') }}
    </p>

    @endif

    @if($errors->any())

    @foreach($errors->all() as $error)

    <p class="error">{{ $error }}</p>

    @endforeach

    @endif

    <form action="/insert-data" method="POST">

        @csrf

        <input type="text"
            name="name"
            placeholder="Name">

        <input type="email"
            name="email"
            placeholder="Email">

        <input type="text"
            name="phone"
            placeholder="Phone">

        <button type="submit">
            Insert
        </button>

    </form>

    <table>

        <tr>

            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Action</th>

        </tr>

        @foreach($students as $student)

        <tr>

            <td>{{ $student->name }}</td>

            <td>{{ $student->email }}</td>

            <td>{{ $student->phone }}</td>

            <td>

                <a href="/edit/{{ $student->_id }}">
                    Edit
                </a>

                |

                <a href="/delete/{{ $student->_id }}"
                    onclick="return confirm('Are you sure?')">
                    Delete
                </a>

            </td>

        </tr>

        @endforeach

    </table>

</body>

</html>