<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class NameRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  Closure(string, ?string=): PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Add validation for name 
        if (empty($value)) {
            $fail('Name field should not be empty');
        }
        $value = trim($value);
        if (!preg_match("/^[a-zA-Z ]+$/", $value)) {
            $fail("Error : Name is not valid");
        }
        if (strlen($value) < 3 || strlen($value) > 50) {
            $fail("Error : Name should be between 3 and 50 characters");
        }
    }
}
