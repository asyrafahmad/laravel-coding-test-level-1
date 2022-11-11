<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    protected $fillable = [
        'name',
        'slug',
        'startAt',
        'endAt',
    ];
    
    protected $keyType = 'string';
}
