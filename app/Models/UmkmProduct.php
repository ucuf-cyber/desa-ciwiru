<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UmkmProduct extends Model
{
    protected $fillable = ['umkm_id','name','photo','price','description'];
    public function umkm() { return $this->belongsTo(Umkm::class); }
}
