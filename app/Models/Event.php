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

    public function participants()
{
    return $this->hasMany(Participant::class, 'event_id');
}
    public function certificate()
    {
        return $this->hasMany(Certificate::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
