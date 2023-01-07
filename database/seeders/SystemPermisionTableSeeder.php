<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SystemPermisionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('system_permision')->delete();
        
        \DB::table('system_permision')->insert(array (
            0 => 
            array (
                'system_permision_id' => 2,
                'system_permision_role' => NULL,
                'system_permision_code' => 'app_upload.getUpdate',
                'system_permision_controller' => 'App\\Http\\Controllers\\AppUploadController',
                'system_permision_module' => 'app_upload',
                'system_permision_user' => NULL,
                'system_permision_level' => NULL,
            ),
        ));
        
        
    }
}