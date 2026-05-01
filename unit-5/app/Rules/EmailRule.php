<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class EmailRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  Closure(string, ?string=): PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Add validation for email
        if (empty($value)) {
            $fail('Email field should not be empty');
        }
        $value = trim($value);
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $fail("Error : Email is not valid");
        }
    }
}