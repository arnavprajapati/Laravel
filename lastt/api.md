Haan bhai, syllabus ke hisaab se almost sab ho gaya. ✅

```text
✅ Model Creation
✅ Migrations
✅ CRUD using Query Builder
✅ Seeding
✅ Using MongoDB with Laravel
✅ CRUD using Eloquent ORM
❌ Implementing REST APIs
```

Bas **REST API** bacha hai.

---

# REST API Kya Hai?

Abhi tak:

```text
Browser
 ↓
Blade
 ↓
Controller
 ↓
Database
```

API me:

```text
Postman / React / Mobile App
 ↓
API Route
 ↓
Controller
 ↓
JSON
```

HTML nahi, JSON return karte hain.

---

# API Controller

```bash
php artisan make:controller Api/StudentController
```

---

# Routes

`routes/api.php`

```php
use App\Http\Controllers\Api\StudentController;

Route::get('/students',[StudentController::class,'index']);

Route::post('/students',[StudentController::class,'store']);

Route::get('/students/{id}',[StudentController::class,'show']);

Route::put('/students/{id}',[StudentController::class,'update']);

Route::delete('/students/{id}',[StudentController::class,'destroy']);
```

---

# Controller

```php
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return response()->json(
            Student::all()
        );
    }

    public function store(Request $request)
    {
        $student = Student::create([
            'name' => $request->name,
            'age' => $request->age
        ]);

        return response()->json($student);
    }

    public function show($id)
    {
        return response()->json(
            Student::find($id)
        );
    }

    public function update(Request $request,$id)
    {
        $student = Student::find($id);

        $student->update([
            'name' => $request->name,
            'age' => $request->age
        ]);

        return response()->json($student);
    }

    public function destroy($id)
    {
        Student::destroy($id);

        return response()->json([
            'message' => 'Deleted'
        ]);
    }
}
```

---

# Test in Postman

## GET All

```http
GET
http://127.0.0.1:8000/api/students
```

Output:

```json
[
  {
    "id":1,
    "name":"Arnav",
    "age":21
  }
]
```

---

## POST

```http
POST
http://127.0.0.1:8000/api/students
```

Body → form-data

```json
{
  "name":"Arnav",
  "age":"21"
}
```

---

## GET One

```http
GET
http://127.0.0.1:8000/api/students/1
```

---

## PUT

```http
PUT
http://127.0.0.1:8000/api/students/1
```

Body:

```json
{
  "name":"Rahul",
  "age":"25"
}
```

---

## DELETE

```http
DELETE
http://127.0.0.1:8000/api/students/1
```

---

# Viva Questions

### REST API kya hai?

**REST API is an interface that allows applications to communicate using HTTP methods and exchange data in JSON format.**

### HTTP Methods

| Method | Work   |
| ------ | ------ |
| GET    | Read   |
| POST   | Create |
| PUT    | Update |
| DELETE | Delete |

### API Route File

```php
routes/api.php
```

### JSON Response

```php
return response()->json($data);
```

---

Agar exam/practical me ye Student API bana li, to **REST API wala syllabus complete maan sakta hai.** 🚀
