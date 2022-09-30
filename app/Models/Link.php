<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $guarded = [];

    // every link belongs to one user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // every link has many visits
    public function visits()
    {
        return $this->hasMany(Visit::class);
    }
}
