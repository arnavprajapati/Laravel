Haan bhai, agar syllabus me pehle **Query Builder CRUD with Blade Form** karna hai, to Eloquent hata dete hain.

# 1. Migration

```bash
php artisan make:migration create_students_table
```

```php
Schema::create('students', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->integer('age');
    $table->timestamps();
});
```

```bash
php artisan migrate
```

---

# 2. Controller

```bash
php artisan make:controller StudentController
```

`app/Http/Controllers/StudentController.php`

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    // Show Data
    public function index()
    {
        $students = DB::table('students')->get();

        return view('students.index', compact('students'));
    }

    // Add Form
    public function create()
    {
        return view('students.create');
    }

    // Insert
    public function store(Request $request)
    {
        DB::table('students')->insert([
            'name' => $request->name,
            'age' => $request->age,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect('/students');
    }

    // Edit Form
    public function edit($id)
    {
        $student = DB::table('students')
                    ->where('id',$id)
                    ->first();

        return view('students.edit', compact('student'));
    }

    // Update
    public function update(Request $request,$id)
    {
        DB::table('students')
            ->where('id',$id)
            ->update([
                'name' => $request->name,
                'age' => $request->age,
                'updated_at' => now()
            ]);

        return redirect('/students');
    }

    // Delete
    public function destroy($id)
    {
        DB::table('students')
            ->where('id',$id)
            ->delete();

        return redirect('/students');
    }
}
```

---

# 3. Routes

`routes/web.php`

```php
use App\Http\Controllers\StudentController;

Route::get('/students',[StudentController::class,'index']);

Route::get('/students/create',[StudentController::class,'create']);

Route::post('/students/store',[StudentController::class,'store']);

Route::get('/students/edit/{id}',[StudentController::class,'edit']);

Route::post('/students/update/{id}',[StudentController::class,'update']);

Route::get('/students/delete/{id}',[StudentController::class,'destroy']);
```

---

# 4. Create Form

`resources/views/students/create.blade.php`

```html
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
```

---

# 5. Index Page

`resources/views/students/index.blade.php`

```html
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
```

---

# 6. Edit Page

`resources/views/students/edit.blade.php`

```html
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
```

---

# Run

```bash
php artisan serve
```

Open:

```text
http://127.0.0.1:8000/students
```

Ye **pure Query Builder CRUD + Blade Forms** hai:

✅ Create Form
✅ Insert (`DB::table()->insert()`)
✅ Read (`DB::table()->get()`)
✅ Edit Form
✅ Update (`DB::table()->update()`)
✅ Delete (`DB::table()->delete()`)

Uske baad isi controller ko Eloquent me convert karna bahut aasaan hai.

Folder Structure Check Karo

Ye hona chahiye:

resources
└── views
    └── students
        ├── index.blade.php
        ├── create.blade.php
        └── edit.blade.php