<?php

namespace Abdullah\Karam\Validation;

class Between implements ValidationInterface
{

    public function __construct(protected string $value, protected string $name, protected string|array $rules)
    {
    }

    public function validate(): string
    {
        $this->rules = explode(',', $this->rules);
        if ($this->value < $this->rules[0] || $this->value > $this->rules[1]) {
            return $this->name . ' is not valid its must be between ' . $this->rules[0] . ' and ' . $this->rules[1];
        }
        return '';
    }

}