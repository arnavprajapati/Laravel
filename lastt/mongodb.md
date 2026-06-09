Theek bhai. **MongoDB setup + same CRUD (Blade form)** karte hain.

# 1. MongoDB Install

MongoDB Community Server install karo.

Check:

```bash id="z8j5pj"
mongosh
```

Agar shell open ho gaya to MongoDB chal raha hai.

---

# 2. Package Install

Laravel me:

```bash id="shz1af"
composer require mongodb/laravel-mongodb
```

---

# 3. .env

MySQL ki jagah:

```env id="zy6hts"
DB_CONNECTION=mongodb
DB_HOST=127.0.0.1
DB_PORT=27017
DB_DATABASE=college

SESSION_DRIVER=file
CACHE_STORE=file
QUEUE_CONNECTION=sync
```

---

# 4. config/database.php

Connections me mongodb entry honi chahiye (package usually add kar deta hai):

```php id="ifxotn"
'mongodb' => [
    'driver' => 'mongodb',
    'host' => env('DB_HOST'),
    'port' => env('DB_PORT'),
    'database' => env('DB_DATABASE'),
],
```

---

# 5. Model

```bash id="4vtzmu"
php artisan make:model Student
```

`app/Models/Student.php`

```php id="0vwg3g"
<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Student extends Model
{
    protected $connection = 'mongodb';

    protected $collection = 'students';

    protected $fillable = [
        'name',
        'age'
    ];
}
```

⚠️ MongoDB me **migration ki zaroorat nahi**.

Collection automatically ban jayegi.

---

# 6. Controller

Same Eloquent jaisa.

```php id="saz6n9"
<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        Student::create([
            'name' => $request->name,
            'age' => $request->age
        ]);

        return redirect('/students');
    }

    public function edit($id)
    {
        $student = Student::find($id);

        return view('students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        $student->update([
            'name' => $request->name,
            'age' => $request->age
        ]);

        return redirect('/students');
    }

    public function destroy($id)
    {
        Student::destroy($id);

        return redirect('/students');
    }
}
```

---

# 7. Routes

Same rahenge:

```php id="x48mnz"
Route::get('/students',[StudentController::class,'index']);

Route::get('/students/create',[StudentController::class,'create']);

Route::post('/students/store',[StudentController::class,'store']);

Route::get('/students/edit/{id}',[StudentController::class,'edit']);

Route::post('/students/update/{id}',[StudentController::class,'update']);

Route::get('/students/delete/{id}',[StudentController::class,'destroy']);
```

---

# 8. Blade Files

Ye bhi **same rahenge**:

```text id="v07m44"
index.blade.php
create.blade.php
edit.blade.php
```

Koi change nahi.

---

# Viva Difference

### MySQL

```text id="kcz8lh"
Database
  ↓
Table
  ↓
Rows
```

Need Migration ✅

---

### MongoDB

```text id="jynp0u"
Database
  ↓
Collection
  ↓
Documents
```

Need Migration ❌

---

### Practical Difference

Query Builder → Controller change

Eloquent ORM → Model + Controller

MongoDB → Database connection + Model inheritance change

Blade aur Routes same rehte hain.

### Ek Line Exam Answer

**MongoDB is a NoSQL document-oriented database that stores data in collections and documents instead of tables and rows.** 🚀
