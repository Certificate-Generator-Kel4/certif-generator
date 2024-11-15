<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;


    protected $fillable = [
        'nama_event', 
        'email',
        'no_telp',
        'deskripsi',
        'logo',
        'tanggal',
        'ttd',
        'user_id',
        
    ];

    public function participant(){
        return $this->hasOne(Participant::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
