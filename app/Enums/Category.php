<?php

namespace App\Enums;

use Illuminate\Support\Str;

enum Category:string
{
    case HealthCare = 'healthcare';
    case Politics = 'politics';
    case Medicine = "medicine";
    case Business = 'business';
    case Lifestyle = 'lifestyle';
    case Religion = 'religion';
    case History = 'africa';
    case Education = 'education';

    public function label()
    {
        return Str::of($this->name)->lower();
    }
}
