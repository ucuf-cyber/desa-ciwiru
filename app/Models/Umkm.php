<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    protected $table = 'umkm';
    protected $fillable = ['name','slug','owner','category','description','thumbnail','address','whatsapp','lat','lng','status'];
    public function products() { return $this->hasMany(UmkmProduct::class); }
}
