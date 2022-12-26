<?php
declare(strict_types=1);

namespace Abdullah\Karam\Validation;

class Required implements ValidationInterface
{
    public function __construct(protected string $value, protected string $name, protected string|array $rules)
    {
    }

    public function validate(): string
    {
        if (empty($this->value))
            return $this->name . ' is required';

        return '';
    }

}