<?php

namespace Abdullah\Karam\Validation;

class Date implements ValidationInterface
{
    public function __construct(protected string $value, protected string $name, string|array $rules)
    {
    }

    public function validate(): string
    {
        $date = \DateTime::createFromFormat('Y-m-d', $this->value);
        if ($date->format('Y-m-d') != $this->value) {
            return $this->name . ' is not valid date';
        }
        return '';
    }
}