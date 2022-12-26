<?php
declare(strict_types=1);

namespace Abdullah\Karam\Validation;

class Text implements ValidationInterface
{
    public function __construct(protected string $value, protected string $name, protected string|array $rules)
    {
    }

    public function validate(): string
    {
        if (!is_string($this->value) && empty($this->value)) {
            return $this->name . ' is not valid text';
        }
        return '';
    }
}