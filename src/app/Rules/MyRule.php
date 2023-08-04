<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MyRule implements ValidationRule
{
    private $n;

    public function __construct($n)
    {
        $this->n = $n;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($value % $this->n == 0)
        {
            $fail('message?');
        }
    }
}
