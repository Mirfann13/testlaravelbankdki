<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PasswordRule implements Rule
{
    public function passes($attribute, $value)
    {
        return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $value);
    }

    public function message()
    {
        return 'Password harus terdiri dari minimal 8 karakter, mengandung huruf besar, huruf kecil, angka, dan karakter khusus.';
    }
}