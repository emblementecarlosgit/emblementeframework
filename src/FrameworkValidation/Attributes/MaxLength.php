<?php
namespace App\FrameworkValidation\Attributes;

use App\FrameworkValidation\Attributes\Contracts\IAttributeValidation;

#[\Attribute(\Attribute::TARGET_PROPERTY)]
final class MaxLength implements IAttributeValidation
{
    public int|float $max_length;
    function __construct (int|float $length)
    {
        $this->max_length = $length;
    }
    public function validate($value): void
    {
        if ($value > $this->max_length)
        {
            throw new \LengthException(message: 'Valor informado é muito grande');
        }
    }
}