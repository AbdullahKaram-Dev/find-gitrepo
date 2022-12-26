<?php
declare(strict_types=1);

namespace Abdullah\Karam\Validation;

class Validation
{
    public static function make(array $inputs, array $rules): array
    {
        $errors = [];
        foreach ($rules as $inputName => $rule) {
            foreach ($rule as $key => $singleRule) {
                if (str_contains($singleRule, ':')) {
                    $class = explode(':', $singleRule)[0];
                    $class = 'Abdullah\Karam\Validation\\' . ucwords($class);
                    $rules = explode(':', $singleRule)[1];
                    $value = (isset($inputs[$inputName])) ? $inputs[$inputName] : '';
                    $error = (new Validator(new $class($value, $inputName,$rules)))->validate();
                } else {
                    $class = 'Abdullah\Karam\Validation\\' . ucwords($singleRule);
                    $value = (isset($inputs[$inputName])) ? $inputs[$inputName] : '';
                    $error = (new Validator(new $class($value, $inputName,[])))->validate();
                }

                if (!empty($error)) {
                    $errors['errors'][$inputName][$key] = $error;
                }
            }
        }
        return $errors;
    }
}