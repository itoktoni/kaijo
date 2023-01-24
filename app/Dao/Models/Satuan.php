<?php

namespace App\Dao\Models;

use App\Dao\Builder\DataBuilder;
use App\Dao\Entities\SatuanEntity;
use App\Dao\Traits\ActiveTrait;
use App\Dao\Traits\ApiTrait;
use App\Dao\Traits\DataTableTrait;
use App\Dao\Traits\OptionTrait;
use App\Http\Resources\GeneralResource;
use Illuminate\Database\Eloquent\Model;
use Kirschbaum\PowerJoins\PowerJoins;
use Kyslik\ColumnSortable\Sortable;
use Mehradsadeghi\FilterQueryString\FilterQueryString as FilterQueryString;
use Plugins\Query;
use Touhidurabir\ModelSanitize\Sanitizable as Sanitizable;

class Satuan extends Model
{
    use Sortable, FilterQueryString, Sanitizable, DataTableTrait, SatuanEntity, ActiveTrait, OptionTrait, PowerJoins, ApiTrait;

    protected $table = 'satuan';
    protected $primaryKey = 'satuan_id';

    protected $fillable = [
        'satuan_id',
        'satuan_kode',
        'satuan_nama',
    ];

    public $sortable = [
        'satuan_nama',
    ];

    protected $casts = [
        'satuan_nama' => 'string'
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
            DataBuilder::build($this->field_code())->name('Kode')->show()->sort(),
            DataBuilder::build($this->field_name())->name('Name')->show()->sort(),
        ];
    }

    public function apiTransform()
    {
        return GeneralResource::class;
    }

    public static function boot()
    {
        parent::creating(function ($model) {
            $code = request()->get($model->field_code());
            $model->{$model->field_code()} = !empty($code) ? $code : Query::autoNumber($model->getTable(), $model->field_code(), 'S', 5);
        });

        parent::boot();
    }
}
