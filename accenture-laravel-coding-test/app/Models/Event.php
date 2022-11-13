<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
// import cache event
use App\Events\EventCreated;
use App\Events\EventUpdated;
use App\Events\EventDeleted;

class Event extends Model
{
    use HasFactory;
    
    // Ignore auto created create_at & updated_at column
    public $timestamps = false;

    protected $fillable = [
        'name',
        'slug',
        'startAt',
        'endAt',
    ];
    
    // For UUID
    protected $keyType = 'string';

    protected $dispatchesEvents = [
        'created' => EventCreated::class,
        'updated' => EventUpdated::class,
        'deleted' => EventDeleted::class,
    ];
}
