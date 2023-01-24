<?php

namespace App\Dao\Models;

use App\Dao\Builder\DataBuilder;
use App\Dao\Entities\InventarisTipeEntity;
use App\Dao\Traits\ActiveTrait;
use App\Dao\Traits\ApiTrait;
use App\Dao\Traits\DataTableTrait;
use App\Dao\Traits\OptionTrait;
use App\Http\Resources\GeneralResource;
use Illuminate\Database\Eloquent\Model;
use Kirschbaum\PowerJoins\PowerJoins;
use Kyslik\ColumnSortable\Sortable;
use Mehradsadeghi\FilterQueryString\FilterQueryString as FilterQueryString;
use Touhidurabir\ModelSanitize\Sanitizable as Sanitizable;

class InventarisTipe extends Model
{
    use Sortable, FilterQueryString, Sanitizable, DataTableTrait, InventarisTipeEntity, ActiveTrait, OptionTrait, PowerJoins, ApiTrait;

    protected $table = 'inventaris_tipe';
    protected $primaryKey = 'it_id';

    protected $fillable = [
        'it_id',
        'it_nama',
    ];

    public $sortable = [
        'it_nama',
    ];

    protected $casts = [
        'it_nama' => 'string'
    ];

    protected $filters = [
        'filter',
    ];

    public $timestamps = false;
    public $incrementing = true;

    public function fieldSearching(){
        return $this->field_name();
    }

    public function fieldDatatable(): array
    {
        return [
            DataBuilder::build($this->field_primary())->name('ID')->show(false)->sort(),
            DataBuilder::build($this->field_name())->name('Name')->show()->sort(),
        ];
    }

    public function apiTransform()
    {
        return GeneralResource::class;
    }
}
