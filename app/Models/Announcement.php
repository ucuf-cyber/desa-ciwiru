<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = ['title','body','is_pinned','published_at'];
    protected $casts = ['is_pinned' => 'boolean', 'published_at' => 'datetime'];
}
