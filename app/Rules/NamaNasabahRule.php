<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NamaNasabahRule implements Rule
{
    public function passes($attribute, $value)
    {
        return preg_match('/^[a-zA-Z\s]+$/', $value) 
               && !preg_match('/(Profesor|Haji)/i', $value);
    }

    public function message()
    {
        return 'Nama tidak valid. Hanya boleh mengandung huruf dan spasi, tanpa gelar Profesor atau Haji.';
    }
}