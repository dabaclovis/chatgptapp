<?php

namespace App\Enums;

enum Country: string
{
    case United_States = 'USA';
    case Canada = 'Canada';
    case United_Kingdom = 'England';
    case Australia = 'Australia';
    case Japan = 'Japan';
    case Germany = 'Germany';
    case France = 'France';
    case India = 'India';
    case China = 'China';
    case Brazil = 'Brazil';

    public function label()
    {
        return str($this->name)->replace('_', '');
    }
}
