<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SystemGroupTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('system_group')->delete();
        
        \DB::table('system_group')->insert(array (
            0 => 
            array (
                'system_group_code' => 'aplikasi_report',
                'system_group_name' => 'Aplikasi Report',
                'system_group_sort' => 2,
                'system_group_enable' => 1,
                'system_group_url' => NULL,
                'system_group_icon' => 'window-sidebar',
                'system_group_description' => NULL,
            ),
            1 => 
            array (
                'system_group_code' => 'laporan',
                'system_group_name' => 'Laporan',
                'system_group_sort' => 1,
                'system_group_enable' => 1,
                'system_group_url' => NULL,
                'system_group_icon' => 'printer',
                'system_group_description' => NULL,
            ),
            2 => 
            array (
                'system_group_code' => 'master_data',
                'system_group_name' => 'Master Data',
                'system_group_sort' => 7,
                'system_group_enable' => 1,
                'system_group_url' => NULL,
                'system_group_icon' => 'database',
                'system_group_description' => NULL,
            ),
            3 => 
            array (
                'system_group_code' => 'setting',
                'system_group_name' => 'Setting',
                'system_group_sort' => -1,
                'system_group_enable' => 1,
                'system_group_url' => NULL,
                'system_group_icon' => 'wrench-adjustable-circle',
                'system_group_description' => NULL,
            ),
        ));
        
        
    }
}