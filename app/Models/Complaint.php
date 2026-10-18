<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable = ['ticket_number','reporter_name','reporter_phone','is_anonymous','category','subject','description','location','evidence','status','admin_response','responded_by','resolved_at'];
    protected $casts = ['evidence' => 'array', 'is_anonymous' => 'boolean', 'resolved_at' => 'datetime'];
}
