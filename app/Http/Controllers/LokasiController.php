<?php

namespace App\Http\Controllers;

use App\Dao\Enums\UserType;
use App\Dao\Models\Lokasi;
use App\Dao\Models\LokasiCustom;
use App\Dao\Repositories\LokasiRepository;
use App\Http\Requests\LokasiRequest;
use App\Http\Services\CreateService;
use App\Http\Services\SingleService;
use App\Http\Services\UpdateService;
use Coderello\SharedData\Facades\SharedData;
use Plugins\Response;
use Plugins\Template;

class LokasiController extends MasterController
{
    public function __construct(LokasiRepository $repository, SingleService $service)
    {
        self::$repository = self::$repository ?? $repository;
        self::$service = self::$service ?? $service;
    }

    protected function beforeForm()
    {
        $custom = LokasiCustom::getOptions();
        self::$share = [
            'custom' => $custom,
        ];
    }

    public function postCreate(LokasiRequest $request, CreateService $service)
    {
        $data = $service->save(self::$repository, $request);
        return Response::redirectBack($data);
    }

    public function postUpdate($code, LokasiRequest $request, UpdateService $service)
    {
        $data = $service->update(self::$repository, $request, $code);
        return Response::redirectBack($data);
    }
}
