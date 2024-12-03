<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CertificateTemplatesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('certificate_templates')->insert([
            ['name' => 'Template 1', 'preview' => '2.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Template 2', 'preview' => '2.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Template 3', 'preview' => '2.jpg', 'created_at' => now(), 'updated_at' => now()],
        ]);        
    }
}
