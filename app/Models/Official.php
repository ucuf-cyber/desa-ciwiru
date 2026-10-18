<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Official extends Model
{
    protected $fillable = ['name','position','division','photo','period_start','period_end','bio','sort_order'];
    protected $casts = ['period_start' => 'date', 'period_end' => 'date'];
}
