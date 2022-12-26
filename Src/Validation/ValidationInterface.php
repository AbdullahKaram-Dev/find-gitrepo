<?php
declare(strict_types=1);

namespace Abdullah\Karam\Validation;

interface ValidationInterface
{
    public function __construct(string $value,string $name,string|array $rules);
    public function validate(): string;
}