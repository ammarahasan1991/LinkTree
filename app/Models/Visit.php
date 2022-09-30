<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $guarded = [];


    // every visit belongs to one link
    public function link()
    {
        return $this->belongsTo(Link::class);
    }
}
