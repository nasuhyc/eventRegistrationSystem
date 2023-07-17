<?php

namespace App\Other\Enums;

use App\Other\Traits\Enum\PrettyName;

enum EventType: string
{
    use PrettyName;
    case    Education = 'education';
    case    Sport = 'sport';
    case    Music = 'music';
    case    Art = 'art';
    case    Conference = 'conference';
}



