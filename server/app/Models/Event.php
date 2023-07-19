<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Event extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'description',
        'speaker',
        'event_date',
        'location',
        'event_type',
    ];


    public function organizers()
    {
        return $this->belongsToMany(User::class, 'organizers');
    }
}

