<?php

namespace App\Dao\Repositories;

use App\Dao\Interfaces\CrudInterface;
use App\Dao\Models\Instansi;
use App\Http\Resources\InstansiResource;

class InstansiRepository extends MasterRepository implements CrudInterface
{
    public function __construct()
    {
        $this->model = empty($this->model) ? new Instansi() : $this->model;
    }
}
