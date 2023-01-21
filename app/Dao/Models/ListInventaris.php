<?php

namespace App\Dao\Models;

use App\Dao\Builder\DataBuilder;
use App\Dao\Entities\InventarisEntity;
use App\Dao\Entities\ListInventarisEntity;
use App\Dao\Traits\ActiveTrait;
use App\Dao\Traits\DataTableTrait;
use App\Dao\Traits\OptionTrait;
use Illuminate\Database\Eloquent\Model;
use Kirschbaum\PowerJoins\PowerJoins;
use Kyslik\ColumnSortable\Sortable;
use Mehradsadeghi\FilterQueryString\FilterQueryString as FilterQueryString;
use Plugins\Query;
use Touhidurabir\ModelSanitize\Sanitizable as Sanitizable;

class ListInventaris extends Model
{
    use Sortable, FilterQueryString, Sanitizable, DataTableTrait, ListInventarisEntity, ActiveTrait, OptionTrait, PowerJoins;

    protected $table = 'list_inventaris';
    protected $primaryKey = 'list_inve_kode';
    protected $keyType = 'string';

    protected $fillable = [
        'list_inve_kode',
        'list_inve_nama',
        'list_inve_aktif',
        'list_inve_deskripsi',
    ];

    public $sortable = [
        'list_inve_nama',
        'list_inve_deskripsi',
    ];

    protected $casts = [
        'list_inve_kode' => 'string',
        'list_inve_aktif' => 'integer'
    ];

    protected $filtelist_inve = [
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

    public static function boot()
    {
        parent::creating(function ($model) {
            $model->{$model->field_code()} = Query::autoNumber($model->getTable(), $model->field_code(), 'LI');
            $model->{$model->field_active()} = 1;
        });

        parent::boot();
    }
}
