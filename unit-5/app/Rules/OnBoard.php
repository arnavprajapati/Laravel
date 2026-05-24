<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OnBoard implements Rule
{
    private $field;
    private $data;
    private $message;

    public function __construct($field, $data)
    {
        $this->field = $field;
        $this->data = $data;
        $this->message = '';
    }

    public function passes($attribute, $value)
    {
        switch ($this->field) {
            case 'name':
                if (empty($value)) {
                    $this->message = 'Name is required.';
                    return false;
                }
                if (!preg_match('/^[a-zA-Z ]+$/', $value)) {
                    $this->message = 'Name must contain only alphabets and spaces.';
                    return false;
                }
                if (strlen($value) < 5 || strlen($value) > 10) {
                    $this->message = 'Name must be between 5 and 10 characters.';
                    return false;
                }
                break;
            case 'email':
                if (empty($value)) {
                    $this->message = 'Email is required.';
                    return false;
                }
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->message = 'Invalid email format.';
                    return false;
                }
                if (!preg_match('/^[A-Za-z0-9._%+-]+@google\\.com$/', $value)) {
                    $this->message = 'Email must be a valid @google.com address.';
                    return false;
                }
                if (DB::table('users')->where('email', $value)->exists()) {
                    $this->message = 'This email is already registered.';
                    return false;
                }
                break;
            case 'password':
                if (empty($value)) {
                    $this->message = 'Password is required.';
                    return false;
                }
                if (strlen($value) < 8) {
                    $this->message = 'Password must be at least 8 characters.';
                    return false;
                }
                if (!preg_match('/[A-Z]/', $value) || !preg_match('/[a-z]/', $value) || !preg_match('/\d/', $value) || !preg_match('/[@$!%*#?&]/', $value)) {
                    $this->message = 'Password must contain uppercase, lowercase, number, and special character.';
                    return false;
                }
                if ($value !== ($this->data['password_confirmation'] ?? '')) {
                    $this->message = 'Passwords do not match.';
                    return false;
                }
                break;
            case 'phone':
                if (empty($value)) {
                    $this->message = 'Phone number is required.';
                    return false;
                }
                if (!preg_match('/^\d{10}$/', $value)) {
                    $this->message = 'Phone number must be exactly 10 digits.';
                    return false;
                }
                break;
            case 'dob':
                if (empty($value)) {
                    $this->message = 'Date of birth is required.';
                    return false;
                }
                $dob = Carbon::parse($value);
                if ($dob->diffInYears(Carbon::now()) < 24) {
                    $this->message = 'Employee must be at least 24 years old.';
                    return false;
                }
                break;
        }
        return true;
    }

    public function message()
    {
        return $this->message;
    }
}
