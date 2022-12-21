<?php
namespace App\FrameworkValidation\Attributes\Contracts;

interface IAttributeValidation {
    public function validate ($value): void;
}