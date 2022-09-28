<?php

namespace Mds\Collivery;

class ValidationException extends \Exception
{
    private array $errors;

    public function __construct(array $errors)
    {
        $this->errors = $errors;
        parent::__construct('Validation error');
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}
