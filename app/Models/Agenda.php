<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table = 'agenda';
    protected $fillable = ['title','description','start_at','end_at','location'];
    protected $casts = ['start_at' => 'datetime', 'end_at' => 'datetime'];
}
