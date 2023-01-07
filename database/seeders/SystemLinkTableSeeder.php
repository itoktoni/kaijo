<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SystemLinkTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('system_link')->delete();
        
        \DB::table('system_link')->insert(array (
            0 => 
            array (
                'system_link_code' => 'groups',
                'system_link_name' => 'Group',
                'system_link_action' => 'groups.getTable',
                'system_link_controller' => 'App\\Http\\Controllers\\GroupsController',
                'system_link_sort' => 1,
                'system_link_description' => NULL,
                'system_link_enable' => NULL,
                'system_link_url' => 'group',
                'system_link_type' => NULL,
            ),
        ));
        
        
    }
}