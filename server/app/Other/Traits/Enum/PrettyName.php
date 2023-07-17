<?php
namespace App\Other\Traits\Enum;

use Illuminate\Support\Str;
trait PrettyName
{

    public function getPrettyName(): string
    {
        $enumClassName = Str::snake(class_basename(static::class));
       return trans("enums\\{$enumClassName}.$this->value");
    }
}
