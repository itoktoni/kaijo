<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SystemMenuConnectionLinkTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('system_menu_connection_link')->delete();
        
        \DB::table('system_menu_connection_link')->insert(array (
            0 => 
            array (
                'system_menu_code' => 'master',
                'system_link_code' => 'groups',
            ),
        ));
        
        
    }
}