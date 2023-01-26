<?php

namespace App\Http\Controllers;

use App\Dao\Models\Instansi;
use App\Dao\Models\Inventaris;
use App\Dao\Models\Lokasi;
use App\Dao\Repositories\KalibrasiRepository;
use App\Http\Requests\KalibrasiRequest;
use App\Http\Services\CreateService;
use App\Http\Services\SingleService;
use App\Http\Services\UpdateService;
use Plugins\Response;

class KalibrasiController extends MasterController
{
    public function __construct(KalibrasiRepository $repository, SingleService $service)
    {
        self::$repository = self::$repository ?? $repository;
        self::$service = self::$service ?? $service;
    }

    protected function beforeForm()
    {
        $instansi = Instansi::getOptions();
        $location = Lokasi::getOptions();
        $inventaris = Inventaris::getOptions();

        self::$share = [
            'inventaris' => $inventaris,
            'location' => $location,
            'instansi' => $instansi,
        ];
    }

    public function postCreate(KalibrasiRequest $request, CreateService $service)
    {
        $data = $service->save(self::$repository, $request);
        return Response::redirectBack($data);
    }

    public function postUpdate($code, KalibrasiRequest $request, UpdateService $service)
    {
        $data = $service->update(self::$repository, $request, $code);
        return Response::redirectBack($data);
    }
}
