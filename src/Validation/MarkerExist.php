<?php
namespace Veneridze\LaravelMarker\Validation;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MarkerExist implements ValidationRule {
    /**
     * Validation rule
     * @param string $attribute
     * @param mixed $value
     * @param \Closure $fail
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void {
    
    }
}