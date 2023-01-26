<?php

namespace App\Http\Controllers;

use App\Dao\Enums\BooleanType;
use App\Dao\Enums\UserType;
use App\Dao\Models\Brand;
use App\Dao\Models\Instansi;
use App\Dao\Models\Inventaris;
use App\Dao\Models\InventarisCustom;
use App\Dao\Models\InventarisNama;
use App\Dao\Models\InventarisTipe;
use App\Dao\Models\ListInventaris;
use App\Dao\Models\Lokasi;
use App\Dao\Repositories\InventarisRepository;
use App\Http\Requests\InventarisRequest;
use App\Http\Services\CreateService;
use App\Http\Services\SingleService;
use App\Http\Services\UpdateService;
use Coderello\SharedData\Facades\SharedData;
use Plugins\Response;
use Plugins\Template;

class InventarisController extends MasterController
{
    public function __construct(InventarisRepository $repository, SingleService $service)
    {
        self::$repository = self::$repository ?? $repository;
        self::$service = self::$service ?? $service;
    }

    protected function beforeForm()
    {
        $boolean = BooleanType::getOptions();
        $type = InventarisTipe::getOptions();
        $brand = Brand::getOptions();
        $instansi = Instansi::getOptions([Instansi::field_code() => Instansi::field_name()]);
        $name = InventarisNama::getOptions([InventarisNama::field_code() => InventarisNama::field_name()]);
        $location = Lokasi::getOptions([Lokasi::field_code() => Lokasi::field_name()]);

        self::$share = [
            'location' => $location,
            'name' => $name,
            'brand' => $brand,
            'instansi' => $instansi,
            'type' => $type,
            'boolean' => $boolean,
        ];
    }

    public function postCreate(InventarisRequest $request, CreateService $service)
    {
        $data = $service->save(self::$repository, $request);
        return Response::redirectBack($data);
    }

    public function postUpdate($code, InventarisRequest $request, UpdateService $service)
    {
        $data = $service->update(self::$repository, $request, $code);
        return Response::redirectBack($data);
    }
}
