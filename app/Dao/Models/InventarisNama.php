<?php

namespace App\Dao\Models;

use App\Dao\Builder\DataBuilder;
use App\Dao\Entities\InventarisEntity;
use App\Dao\Entities\InventarisNamaEntity;
use App\Dao\Entities\NamaInventarisEntity;
use App\Dao\Traits\ActiveTrait;
use App\Dao\Traits\ApiTrait;
use App\Dao\Traits\DataTableTrait;
use App\Dao\Traits\OptionTrait;
use App\Http\Resources\InventarisNamaResource;
use Illuminate\Database\Eloquent\Model;
use Kirschbaum\PowerJoins\PowerJoins;
use Kyslik\ColumnSortable\Sortable;
use Mehradsadeghi\FilterQueryString\FilterQueryString as FilterQueryString;
use Plugins\Query;
use Touhidurabir\ModelSanitize\Sanitizable as Sanitizable;

class InventarisNama extends Model
{
    use Sortable, FilterQueryString, Sanitizable, DataTableTrait, InventarisNamaEntity, ActiveTrait, OptionTrait, PowerJoins, ApiTrait;

    protected $table = 'inventaris_nama';
    protected $primaryKey = 'in_id';

    protected $fillable = [
        'in_id',
        'in_kode',
        'in_nama',
        'in_deskripsi',
    ];

    public $sortable = [
        'in_nama',
        'in_deskripsi',
    ];

    protected $casts = [
        'in_kode' => 'string',
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
            DataBuilder::build($this->field_code())->name('Code')->show()->sort(),
            DataBuilder::build($this->field_name())->name('Name')->show()->sort(),
            DataBuilder::build($this->field_description())->name('Deskripsi')->show()->sort(),
        ];
    }

    public function apiTransform()
    {
        return InventarisNamaResource::class;
    }

    public static function boot()
    {
        parent::creating(function ($model) {
            $model->{$model->field_code()} = Query::autoNumber($model->getTable(), $model->field_code(), 'IN', 6);
        });

        parent::boot();
    }
}
