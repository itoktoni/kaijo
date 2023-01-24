<?php

namespace App\Dao\Models;

use App\Dao\Builder\DataBuilder;
use App\Dao\Entities\BrandEntity;
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

class Brand extends Model
{
    use Sortable, FilterQueryString, Sanitizable, DataTableTrait, BrandEntity, ActiveTrait, OptionTrait, PowerJoins, ApiTrait;

    protected $table = 'brand';
    protected $primaryKey = 'brand_id';

    protected $fillable = [
        'brand_id',
        'brand_nama',
        'brand_deskripsi',
    ];

    public $sortable = [
        'brand_nama',
    ];

    protected $casts = [
        'brand_nama' => 'string'
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
            DataBuilder::build($this->field_description())->name('Deskripsi')->show()->sort(),
        ];
    }

    public function apiTransform()
    {
        return GeneralResource::class;
    }
}
