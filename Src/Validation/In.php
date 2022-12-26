<?php

namespace Abdullah\Karam\Validation;

class In implements ValidationInterface
{
    public function __construct(protected string $value, protected string $name, protected string|array $rules)
    {
    }

    public function validate(): string
    {
        $this->makeRulesToLowerCase();
        $this->makeValueToLowerCase();
        $this->rules = explode(',', $this->rules);
        if (!in_array($this->value, $this->rules)) {
            return $this->name . ' is not valid its must be one of these values ' . implode(',', $this->rules);
        }
        return '';
    }

    private function makeValueToLowerCase(): void
    {
        $this->value = strtolower($this->value);
    }

    private function makeRulesToLowerCase(): void
    {
        $this->rules = strtolower($this->rules);
    }

}