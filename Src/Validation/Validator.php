<?php
declare(strict_types=1);

namespace Abdullah\Karam\Validation;

class Validator
{
    public function __construct(protected ValidationInterface $validation)
    {
    }

    public function validate(): string
    {
        return $this->validation->validate();
    }
}