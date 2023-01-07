<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SystemRoleTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('system_role')->delete();
        
        \DB::table('system_role')->insert(array (
            0 => 
            array (
                'system_role_code' => 'admin',
                'system_role_name' => 'Admin',
                'system_role_description' => 'ini buat seluruh system untuk mengatur',
                'system_role_level' => 100,
            ),
            1 => 
            array (
                'system_role_code' => 'teknisi_alat_medis',
                'system_role_name' => 'Teknisi Alat Medis',
                'system_role_description' => 'Teknisi',
                'system_role_level' => 2,
            ),
            2 => 
            array (
                'system_role_code' => 'teknisi_vendor',
                'system_role_name' => 'Teknisi Luar',
                'system_role_description' => 'test',
                'system_role_level' => 2,
            ),
            3 => 
            array (
                'system_role_code' => 'user',
                'system_role_name' => 'User',
                'system_role_description' => 'pengguna',
                'system_role_level' => 1,
            ),
        ));
        
        
    }
}