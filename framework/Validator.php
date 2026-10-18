<?php

namespace Framework;

class Validator
{
    protected $errors = [];

    public function __construct(
        protected array $data,
        protected array $rules = []
    ) {
        $this->validate();
    } 

    public function validate(): void
    {
        foreach ($this->rules as $field => $rules) 
        {
          $value = trim($this->data[$field] ?? "");
          $rules = explode('|', $rules);

          foreach ($rules as $rule)
            {
              [$name, $parameters] = array_pad(explode(':', $rule, 2), 2, null);

              if ($error = $this->hasError($name, $value, $parameters, $field)) {
                $this->errors[] = $error;
                break; // Detener la validación de reglas para este campo si hay un error
              }
            }
        }
    }

    protected function hasError(string $name, string $value, ?string $parameters, string $field): ?string
    {
      return match ($name) {
          'required'  => $this->validateRequired($value, $field),
          'min'       => $this->validateMin($value, $parameters, $field),
          'max'       => $this->validateMax($value, $parameters, $field),
          'url'       => $this->validateUrl($value, $field),
          'email'     => $this->validateEmail($value, $field),
          default     => throw new \InvalidArgumentException("Validation rule '$name' is not defined."),
      };
    }

    public function validateRequired(string $value, string $field): ?string
    {
        return (is_null($value) || $value === '') ? "El campo {$field} es obligatorio." : null;
    }

    public function validateMin(string $value, ?string $parameters, string $field): ?string
    {
        return strlen($value) < (int)$parameters ? "El campo {$field} debe tener al menos {$parameters} caracteres." : null;
    }

    public function validateMax(string $value, ?string $parameters, string $field): ?string
    {
        return strlen($value) > (int)$parameters ? "El campo {$field} no puede tener más de {$parameters} caracteres." : null;
    }

    public function validateUrl(string $value, string $field): ?string
    {
        return !filter_var($value, FILTER_VALIDATE_URL) ? "El campo {$field} debe ser una URL válida." : null;
    }

    public function passes(): bool
    {
        return empty($this->errors);
    }

    public function validateEmail(string $value, string $field): ?string
    {
        return !filter_var($value, FILTER_VALIDATE_EMAIL) ? "El campo {$field} debe ser una E-mail válido." : null;
    }

    public function errors(): array
    {
        return $this->errors;
    
    }
  
}