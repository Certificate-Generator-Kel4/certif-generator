<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 
        'email',
        'no_telp',
        'event_id',
    ];

    public function event(){
        return $this->belongsTo(Event::class);
    }
}
