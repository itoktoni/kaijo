<?php

namespace App\Dao\Repositories;

use App\Dao\Interfaces\CrudInterface;
use App\Dao\Models\Inventaris;
use Plugins\Notes;

class InventarisRepository extends MasterRepository implements CrudInterface
{
    public function __construct()
    {
        $this->model = empty($this->model) ? new Inventaris() : $this->model;
    }

    public function dataRepository()
    {
        $query = $this->model
            ->select($this->model->getSelectedField())
            ->with(['has_name', 'has_location', 'has_type', 'has_brand', 'has_instansi'])
            ->leftJoinRelationship('has_name')
            ->leftJoinRelationship('has_location')
            ->leftJoinRelationship('has_type')
            ->leftJoinRelationship('has_brand')
            ->leftJoinRelationship('has_instansi')
            ->sortable()->filter();

            if(request()->hasHeader('authorization')){
                if($paging = request()->get('paginate')){
                    return $query->paginate($paging);
                }

                if(method_exists($this->model, 'getApiCollection')){
                    return $this->model->getApiCollection($query->get());
                }

                return Notes::data($query->get());
            }

        $query = env('PAGINATION_SIMPLE') ? $query->simplePaginate(env('PAGINATION_NUMBER')) : $query->paginate(env('PAGINATION_NUMBER'));

        return $query;
    }
}
