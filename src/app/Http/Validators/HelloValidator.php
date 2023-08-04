<?php

namespace App\Http\Validators;

use Exception;
use Illuminate\Validation\Validator;

class HelloValidator extends Validator
{
    public function validateHello($attribute, $value, $parameters)
    {
        if (empty($parameters[0]) or !is_numeric($parameters[0]))
        {
            throw new Exception('param 0 must be int');
        }

        return $value % intval($parameters[0]) == 0;
    }
}
