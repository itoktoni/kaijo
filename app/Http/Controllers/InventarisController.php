<?php

namespace App\Http\Controllers;

use App\Dao\Enums\UserType;
use App\Dao\Models\Inventaris;
use App\Dao\Models\InventarisCustom;
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
        $name = ListInventaris::getOptions();
        $location = Lokasi::getOptions();
        self::$share = [
            'location' => $location,
            'name' => $name,
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
