<?php

namespace App\Http\Controllers;

use App\Dao\Enums\UserType;
use App\Dao\Models\InventarisTipe;
use App\Dao\Models\InventarisTipeCustom;
use App\Dao\Repositories\InventarisTipeRepository;
use App\Http\Requests\GeneralRequest;
use App\Http\Requests\InventarisTipeRequest;
use App\Http\Services\CreateService;
use App\Http\Services\SingleService;
use App\Http\Services\UpdateService;
use Coderello\SharedData\Facades\SharedData;
use Plugins\Response;
use Plugins\Template;

class InventarisTipeController extends MasterController
{
    public function __construct(InventarisTipeRepository $repository, SingleService $service)
    {
        self::$repository = self::$repository ?? $repository;
        self::$service = self::$service ?? $service;
    }

    public function postCreate(GeneralRequest $request, CreateService $service)
    {
        $data = $service->save(self::$repository, $request);
        return Response::redirectBack($data);
    }

    public function postUpdate($code, GeneralRequest $request, UpdateService $service)
    {
        $data = $service->update(self::$repository, $request, $code);
        return Response::redirectBack($data);
    }
}
