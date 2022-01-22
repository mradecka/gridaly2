<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $appends = ['slug'];

    protected $fillable = [
        'name',
        'started_at',
        'ended_at',
        'status',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getSlugAttribute()
    {
        return strtolower(str_replace(' ', '-', $this->name));
    }
}
