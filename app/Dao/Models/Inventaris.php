<?php

namespace App\Dao\Models;

use App\Dao\Builder\DataBuilder;
use App\Dao\Entities\InventarisEntity;
use App\Dao\Traits\ActiveTrait;
use App\Dao\Traits\DataTableTrait;
use App\Dao\Traits\OptionTrait;
use Illuminate\Database\Eloquent\Model;
use Kirschbaum\PowerJoins\PowerJoins;
use Kyslik\ColumnSortable\Sortable;
use Mehradsadeghi\FilterQueryString\FilterQueryString as FilterQueryString;
use Plugins\Query;
use Touhidurabir\ModelSanitize\Sanitizable as Sanitizable;

class Inventaris extends Model
{
    use Sortable, FilterQueryString, Sanitizable, DataTableTrait, InventarisEntity, ActiveTrait, OptionTrait, PowerJoins;

    protected $table = 'inventaris';
    protected $primaryKey = 'inventaris_id';
    protected $with = ['has_name'];

    protected $fillable = [
        'inventaris_id',
        'inventaris_sn',
        'inventaris_deskripsi',
        'inventaris_aktif',
        'inventaris_id_list_nama',
        'inventaris_id_location',
        'inventaris_created_at',
        'inventaris_updated_at',
        'inventaris_deleted_at',
        'inventaris_created_by',
        'inventaris_updated_by',
        'inventaris_deleted_by',
    ];

    public $sortable = [
        'inventaris_sn',
        'inventaris_deskripsi',
    ];

    protected $casts = [
        'inventaris_aktif' => 'integer',
        'inventaris_id_list_nama' => 'string'
    ];

    protected $filteinventaris = [
        'filter',
    ];

    public $timestamps = true;
    public $incrementing = true;

    const CREATED_AT = 'inventaris_created_at';
    const UPDATED_AT = 'inventaris_updated_at';
    const DELETED_AT = 'inventaris_deleted_at';

    const CREATED_BY = 'inventaris_created_by';
    const UPDATED_BY = 'inventaris_updated_by';
    const DELETED_BY = 'inventaris_deleted_by';

    public function fieldSearching(){
        return $this->field_name();
    }

    public function fieldDatatable(): array
    {
        return [
            DataBuilder::build($this->field_primary())->name('ID')->show(false)->sort(),
            DataBuilder::build($this->field_code())->name('Serial Number')->sort(),
            DataBuilder::build($this->field_name()) ->name('Name')->show()->sort(),
            DataBuilder::build($this->field_description())->name('Deskripsi')->show()->sort(),
        ];
    }

    public function has_name()
    {
        return $this->hasOne(ListInventaris::class, ListInventaris::field_primary(), self::field_link_name());
    }

    public static function boot()
    {
        parent::creating(function ($model) {
            $code = request()->get($model->field_code());
            $model->{$model->field_code()} = !empty($code) ? $code : Query::autoNumber($model->getTable(), $model->field_code(), 'IN');
            $model->{$model->field_active()} = 1;
        });

        parent::boot();
    }
}
