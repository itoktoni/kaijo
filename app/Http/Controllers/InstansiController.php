<?php

namespace App\Http\Controllers;

use App\Dao\Models\Lokasi;
use App\Dao\Repositories\InstansiRepository;
use App\Http\Requests\InstansiRequest;
use App\Http\Services\CreateService;
use App\Http\Services\SingleService;
use App\Http\Services\UpdateInstansiService;
use App\Http\Services\UpdateService;
use Coderello\SharedData\Facades\SharedData;
use Plugins\Response;
use Plugins\Template;

class InstansiController extends MasterController
{
    public function __construct(InstansiRepository $repository, SingleService $service)
    {
        self::$repository = self::$repository ?? $repository;
        self::$service = self::$service ?? $service;
    }

    public function postCreate(InstansiRequest $request, CreateService $service)
    {
        $data = $service->save(self::$repository, $request);
        return Response::redirectBack($data);
    }

    public function postUpdate($code, InstansiRequest $request, UpdateInstansiService $service)
    {
        $data = $service->update(self::$repository, $request, $code);
        return Response::redirectBack($data);
    }

    protected function beforeForm(){

        $lokasi = Lokasi::getOptions();

        self::$share = [
            'lokasi' => $lokasi,
        ];
    }

    public function getUpdate($code)
    {
        $data = $this->get($code, ['has_lokasi']);
        $selected = $data->has_lokasi->pluck(Lokasi::field_primary()) ?? [];

        $this->beforeForm();
        $this->beforeUpdate($code);
        return moduleView(modulePathForm(), $this->share([
            'model' => $data,
            'selected' => $selected,
        ]));
    }
}
