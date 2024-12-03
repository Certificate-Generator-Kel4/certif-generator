<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CertificateTemplates;

class CertificateTemplate  extends Model
{
    use HasFactory;

    protected $table = 'certificate_templates';
    protected $fillable = ['name', 'preview'];

    
    public function certificates()
    {
        return $this->hasMany(Certificate::class, 'template_id'); 
    }
}
