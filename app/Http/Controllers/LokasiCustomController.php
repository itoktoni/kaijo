<?php

namespace App\Http\Controllers;

use App\Dao\Enums\UserType;
use App\Dao\Models\LokasiCustom;
use App\Dao\Repositories\LokasiCustomRepository;
use App\Http\Requests\LokasiCustomRequest;
use App\Http\Services\CreateService;
use App\Http\Services\SingleService;
use App\Http\Services\UpdateService;
use Coderello\SharedData\Facades\SharedData;
use Plugins\Response;
use Plugins\Template;

class LokasiCustomController extends MasterController
{
    public function __construct(LokasiCustomRepository $repository, SingleService $service)
    {
        self::$repository = self::$repository ?? $repository;
        self::$service = self::$service ?? $service;
    }

    public function postCreate(LokasiCustomRequest $request, CreateService $service)
    {
        $data = $service->save(self::$repository, $request);
        return Response::redirectBack($data);
    }

    public function postUpdate($code, LokasiCustomRequest $request, UpdateService $service)
    {
        $data = $service->update(self::$repository, $request, $code);
        return Response::redirectBack($data);
    }
}
