<?php
declare(strict_types=1);

namespace Abdullah\Karam\Validation;

class Numeric implements ValidationInterface
{
    public function __construct(protected string $value,protected string $name,$rules)
    {
    }

    public function validate(): string
    {
        if (!is_numeric($this->value)) {
            return $this->name . ' is not valid its must be numeric';
        }
        return '';
    }
}