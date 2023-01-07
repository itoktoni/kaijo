<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SystemMenuTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('system_menu')->delete();
        
        \DB::table('system_menu')->insert(array (
            0 => 
            array (
                'system_menu_code' => 'roles',
                'system_menu_name' => 'Roles',
                'system_menu_url' => 'roles',
                'system_menu_controller' => 'App\\Http\\Controllers\\RolesController',
                'system_menu_action' => 'roles.getTable',
                'system_menu_type' => 1,
                'system_menu_sort' => 9,
                'system_menu_description' => NULL,
                'system_menu_enable' => NULL,
                'system_menu_can_delete' => 1,
            ),
            1 => 
            array (
                'system_menu_code' => 'user',
                'system_menu_name' => 'User',
                'system_menu_url' => 'user',
                'system_menu_controller' => 'App\\Http\\Controllers\\UserController',
                'system_menu_action' => 'user.getTable',
                'system_menu_type' => 1,
                'system_menu_sort' => NULL,
                'system_menu_description' => '',
                'system_menu_enable' => NULL,
                'system_menu_can_delete' => 1,
            ),
            2 => 
            array (
                'system_menu_code' => 'master',
                'system_menu_name' => 'Master',
                'system_menu_url' => 'master',
                'system_menu_controller' => NULL,
                'system_menu_action' => NULL,
                'system_menu_type' => 2,
                'system_menu_sort' => NULL,
                'system_menu_description' => NULL,
                'system_menu_enable' => NULL,
                'system_menu_can_delete' => 1,
            ),
            3 => 
            array (
                'system_menu_code' => 'setting',
                'system_menu_name' => 'Setting Website',
                'system_menu_url' => 'pengaturan',
                'system_menu_controller' => 'App\\Http\\Controllers\\SettingController',
                'system_menu_action' => 'setting.getCreate',
                'system_menu_type' => 1,
                'system_menu_sort' => NULL,
                'system_menu_description' => '',
                'system_menu_enable' => NULL,
                'system_menu_can_delete' => 1,
            ),
            4 => 
            array (
                'system_menu_code' => 'groups',
                'system_menu_name' => 'Group',
                'system_menu_url' => 'groups',
                'system_menu_controller' => 'App\\Http\\Controllers\\GroupsController',
                'system_menu_action' => 'groups.getTable',
                'system_menu_type' => 1,
                'system_menu_sort' => 10,
                'system_menu_description' => NULL,
                'system_menu_enable' => NULL,
                'system_menu_can_delete' => 1,
            ),
            5 => 
            array (
                'system_menu_code' => 'menu',
                'system_menu_name' => 'Menu',
                'system_menu_url' => 'menu',
                'system_menu_controller' => 'App\\Http\\Controllers\\MenuController',
                'system_menu_action' => 'menu.getTable',
                'system_menu_type' => 1,
                'system_menu_sort' => 8,
                'system_menu_description' => '',
                'system_menu_enable' => NULL,
                'system_menu_can_delete' => 1,
            ),
            6 => 
            array (
                'system_menu_code' => 'link',
                'system_menu_name' => 'Link',
                'system_menu_url' => 'link',
                'system_menu_controller' => 'App\\Http\\Controllers\\LinkController',
                'system_menu_action' => 'link.getTable',
                'system_menu_type' => 1,
                'system_menu_sort' => 7,
                'system_menu_description' => NULL,
                'system_menu_enable' => NULL,
                'system_menu_can_delete' => 1,
            ),
            7 => 
            array (
                'system_menu_code' => 'permission',
                'system_menu_name' => 'Permission',
                'system_menu_url' => 'permission',
                'system_menu_controller' => 'App\\Http\\Controllers\\PermissionController',
                'system_menu_action' => 'permission.getTable',
                'system_menu_type' => 1,
                'system_menu_sort' => NULL,
                'system_menu_description' => NULL,
                'system_menu_enable' => NULL,
                'system_menu_can_delete' => 1,
            ),
            8 => 
            array (
                'system_menu_code' => 'app_upload',
                'system_menu_name' => 'Aplikasi Upload',
                'system_menu_url' => 'app_upload',
                'system_menu_controller' => 'App\\Http\\Controllers\\AppUploadController',
                'system_menu_action' => 'app_upload.getTable',
                'system_menu_type' => 1,
                'system_menu_sort' => NULL,
                'system_menu_description' => NULL,
                'system_menu_enable' => NULL,
                'system_menu_can_delete' => 1,
            ),
            9 => 
            array (
                'system_menu_code' => 'report_app_bersih',
                'system_menu_name' => 'Report Bersih',
                'system_menu_url' => 'report_app_bersih',
                'system_menu_controller' => 'App\\Http\\Controllers\\ReportAppBersihController',
                'system_menu_action' => 'report_app_bersih.getCreate',
                'system_menu_type' => 1,
                'system_menu_sort' => NULL,
                'system_menu_description' => '',
                'system_menu_enable' => NULL,
                'system_menu_can_delete' => 1,
            ),
            10 => 
            array (
                'system_menu_code' => 'report_app_mutasi',
                'system_menu_name' => 'Report Mutasi',
                'system_menu_url' => 'report_app_mutasi',
                'system_menu_controller' => 'App\\Http\\Controllers\\ReportAppMutasiController',
                'system_menu_action' => 'report_app_mutasi.getCreate',
                'system_menu_type' => 1,
                'system_menu_sort' => NULL,
                'system_menu_description' => NULL,
                'system_menu_enable' => NULL,
                'system_menu_can_delete' => 1,
            ),
            11 => 
            array (
                'system_menu_code' => 'app_pricing',
                'system_menu_name' => 'Pricing',
                'system_menu_url' => 'app_pricing',
                'system_menu_controller' => 'App\\Http\\Controllers\\AppPricingController',
                'system_menu_action' => 'app_pricing.getTable',
                'system_menu_type' => 1,
                'system_menu_sort' => NULL,
                'system_menu_description' => NULL,
                'system_menu_enable' => NULL,
                'system_menu_can_delete' => 1,
            ),
            12 => 
            array (
                'system_menu_code' => 'report_app_invoice',
                'system_menu_name' => 'Report Invoice',
                'system_menu_url' => 'report_invoice',
                'system_menu_controller' => 'App\\Http\\Controllers\\ReportAppInvoiceController',
                'system_menu_action' => 'report_app_invoice.getCreate',
                'system_menu_type' => 1,
                'system_menu_sort' => NULL,
                'system_menu_description' => NULL,
                'system_menu_enable' => NULL,
                'system_menu_can_delete' => 1,
            ),
        ));
        
        
    }
}