<?php

namespace App\Dao\Repositories;

use App\Dao\Interfaces\CrudInterface;
use App\Dao\Models\Kalibrasi;
use Plugins\Notes;

class KalibrasiRepository extends MasterRepository implements CrudInterface
{
    public function __construct()
    {
        $this->model = empty($this->model) ? new Kalibrasi() : $this->model;
    }
}
