<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageView extends Model
{
    protected $fillable = ['url','ip','user_agent','viewed_at'];
    public $timestamps = false;
}
