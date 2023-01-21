<?php

namespace App\Http\Controllers;

use App\Dao\Enums\UserType;
use App\Dao\Models\ListInventaris;
use App\Dao\Models\ListInventarisCustom;
use App\Dao\Repositories\ListInventarisRepository;
use App\Http\Requests\ListInventarisRequest;
use App\Http\Services\CreateService;
use App\Http\Services\SingleService;
use App\Http\Services\UpdateService;
use Coderello\SharedData\Facades\SharedData;
use Plugins\Response;
use Plugins\Template;

class ListInventarisController extends MasterController
{
    public function __construct(ListInventarisRepository $repository, SingleService $service)
    {
        self::$repository = self::$repository ?? $repository;
        self::$service = self::$service ?? $service;
    }

    protected function beforeForm()
    {
        self::$share = [
        ];
    }

    public function postCreate(ListInventarisRequest $request, CreateService $service)
    {
        $data = $service->save(self::$repository, $request);
        return Response::redirectBack($data);
    }

    public function postUpdate($code, ListInventarisRequest $request, UpdateService $service)
    {
        $data = $service->update(self::$repository, $request, $code);
        return Response::redirectBack($data);
    }
}
