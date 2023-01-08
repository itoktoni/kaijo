<?php

namespace App\Http\Controllers;

use App\Dao\Enums\UserType;
use App\Dao\Models\Rs;
use App\Dao\Models\Ruangan;
use App\Dao\Repositories\RsRepository;
use App\Http\Requests\RsRequest;
use App\Http\Services\CreateService;
use App\Http\Services\SingleService;
use App\Http\Services\UpdateRsService;
use App\Http\Services\UpdateService;
use Coderello\SharedData\Facades\SharedData;
use Plugins\Response;
use Plugins\Template;

class RsController extends MasterController
{
    public function __construct(RsRepository $repository, SingleService $service)
    {
        self::$repository = self::$repository ?? $repository;
        self::$service = self::$service ?? $service;
    }

    public function postCreate(RsRequest $request, CreateService $service)
    {
        $data = $service->save(self::$repository, $request);
        return Response::redirectBack($data);
    }

    public function postUpdate($code, RsRequest $request, UpdateRsService $service)
    {
        $data = $service->update(self::$repository, $request, $code);
        return Response::redirectBack($data);
    }

    protected function beforeForm(){

        $ruangan = Ruangan::getOptions();

        self::$share = [
            'ruangan' => $ruangan,
        ];
    }

    public function getUpdate($code)
    {
        $data = $this->get($code, ['has_ruangan']);
        $selected = $data->has_ruangan->pluck(Ruangan::field_primary()) ?? [];

        $this->beforeForm();
        $this->beforeUpdate($code);
        return moduleView(modulePathForm(), $this->share([
            'model' => $data,
            'selected' => $selected,
        ]));
    }
}
