<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    protected $table = 'wisata';
    protected $fillable = ['name','slug','description','thumbnail','lat','lng','ticket_price','open_hours','facilities','route','status'];
    protected $casts = ['open_hours' => 'array', 'facilities' => 'array'];
}
