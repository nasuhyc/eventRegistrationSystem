<?php

namespace App\Other\Enums;

use App\Other\Traits\Enum\PrettyName;

enum EventStatus: string
{
    use PrettyName;
    case    Planned = 'planned';
    case    Approved = 'approved';
    case    Finished = 'finished';
    case    Canceled = 'canceled';
}
