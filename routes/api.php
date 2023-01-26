<?php

use App\Dao\Enums\MenuType;
use App\Dao\Models\Instansi;
use App\Dao\Models\InventarisNama;
use App\Dao\Models\Lokasi;
use App\Dao\Models\Rs;
use App\Dao\Models\Ruangan;
use App\Dao\Repositories\InventarisRepository;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Resources\InstansiResource;
use App\Http\Resources\InventarisNamaResource;
use App\Http\Resources\InventarisResource;
use App\Http\Resources\LokasiResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Buki\AutoRoute\AutoRouteFacade as AutoRoute;
use Plugins\Core;
use Plugins\Query;
use Illuminate\Support\Str;
use Plugins\Notes;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [UserController::class, 'postLoginApi'])->name('postLoginApi');
$core = [
    "App\Http\Controllers\RolesController",
    "App\Http\Controllers\UserController",
    "App\Http\Controllers\SettingController",
    "App\Http\Controllers\GroupsController",
    "App\Http\Controllers\MenuController",
    "App\Http\Controllers\LinkController",
    "App\Http\Controllers\PermissionController",
];

$routes = Query::getMenu()->whereNotIn('menu_controller', $core)->unique('menu_controller')->pluck('menu_controller');
if($routes){
	Route::middleware(['auth:sanctum'])->group(function () use ($routes) {
		foreach ($routes as $menu) {
			try {
				$name = Core::getControllerName($menu);
				AutoRoute::auto(Str::snake($name), $menu, [
					'name' => 'api_'.$name,
					'only' => [
						'getData',
						'postCreate',
						'postUpdate',
						'postDelete',
						'postSync',
					]
				]);
			} catch (\Throwable$th) {
				//throw $th;
			}
		}
	});
}

Route::get('configuration', function(Request $request){

	$data = [
		'domain' => env('APP_URL', 'https://sayur24jam.com'),
		'version' => '1.0.0',
		'book' => url('/book.pdf'),
		'qr_format' => [
			'instansi' => 'RS001',
			'lokasi' => 'UGD',
			'nama' => 'LAPTOP LENOVO',
			'inventaris' => 'VEN001',
		],
		'manual_format' => [
			'instansi' => 'RS001',
			'lokasi' => 'UGD',
			'inventaris' => 'VEN001',
		]
	];

	return Notes::data($data);
});