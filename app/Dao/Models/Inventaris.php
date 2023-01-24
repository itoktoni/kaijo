<?php

namespace App\Dao\Models;

use App\Dao\Builder\DataBuilder;
use App\Dao\Entities\InventarisEntity;
use App\Dao\Traits\ActiveTrait;
use App\Dao\Traits\ApiTrait;
use App\Dao\Traits\DataTableTrait;
use App\Dao\Traits\OptionTrait;
use App\Http\Resources\InventarisResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kirschbaum\PowerJoins\PowerJoins;
use Kyslik\ColumnSortable\Sortable;
use Mehradsadeghi\FilterQueryString\FilterQueryString as FilterQueryString;
use Plugins\Query;
use Touhidurabir\ModelSanitize\Sanitizable as Sanitizable;
use Wildside\Userstamps\Userstamps;

class Inventaris extends Model
{
    use Sortable, FilterQueryString, Sanitizable, DataTableTrait, InventarisEntity, ActiveTrait, OptionTrait, PowerJoins, ApiTrait, SoftDeletes, Userstamps;

    protected $table = 'inventaris';
    protected $primaryKey = 'inventaris_id';

    protected $fillable = [
        'inventaris_id',
        'inventaris_kode',
        'inventaris_nama',
        'inventaris_id_nama',
        'inventaris_id_lokasi',
        'inventaris_id_tipe',
        'inventaris_id_brand',
        'inventaris_deskripsi',
        'inventaris_is_kalibrator',
        'inventaris_is_asset',
    ];

    public $sortable = [
        'inventaris_nama',
        'inventaris_deskripsi',
    ];

    protected $casts = [
        'inventaris_id' => 'integer',
        'inventaris_id_nama' => 'string',
        'inventaris_id_lokasi' => 'string'
    ];

    protected $filters = [
        'filter',
        'is_kalibrator'
    ];

    protected $with = ['has_name'];

    public $timestamps = true;
    public $incrementing = true;

    public function fieldSearching(){
        return $this->field_name();
    }

    const CREATED_AT = 'inventaris_created_at';
    const UPDATED_AT = 'inventaris_updated_at';
    const DELETED_AT = 'inventaris_deleted_at';

    const CREATED_BY = 'inventaris_created_by';
    const UPDATED_BY = 'inventaris_updated_by';
    const DELETED_BY = 'inventaris_deleted_by';


    public function fieldDatatable(): array
    {
        return [
            DataBuilder::build($this->field_primary())->name('ID')->show(false)->sort(),
            DataBuilder::build($this->field_code())->name('Kode')->show()->sort(),
            DataBuilder::build($this->field_is_kalibrator())->name('Kalibrator')->show()->width('110px')->sort(),
            DataBuilder::build($this->field_is_asset())->name('Asset')->show()->sort()->width('90px'),
            DataBuilder::build($this->field_id_type())->name('Name')->show(false)->sort(),
            DataBuilder::build(InventarisTipe::field_name())->name('Tipe')->show()->sort()->width('80px'),
            DataBuilder::build($this->field_id_brand())->name('Name')->show(false)->sort(),
            DataBuilder::build(Brand::field_name())->name('Brand')->show()->sort()->width('120px'),
            DataBuilder::build($this->field_id_location())->name('Name')->show(false)->sort(),
            DataBuilder::build(Lokasi::field_name())->name('Lokasi')->show()->sort()->width('100px'),
            DataBuilder::build($this->field_id_name())->name('Name')->show(false)->sort(),
            DataBuilder::build(InventarisNama::field_name())->name('Name')->show()->sort()->width('200px'),
            DataBuilder::build($this->field_description())->name('Deskripsi')->show()->sort()->width('120px'),
        ];
    }

    public function is_kalibrator($query, $value){
        return $query->where($this->field_is_kalibrator(), $value);
    }

    public function apiTransform()
    {
        return InventarisResource::class;
    }

    public function has_name()
    {
        return $this->hasOne(InventarisNama::class, InventarisNama::field_code(), self::field_id_name());
    }

    public function has_location()
    {
        return $this->hasOne(Lokasi::class, Lokasi::field_code(), self::field_id_location());
    }

    public function has_type()
    {
        return $this->hasOne(InventarisTipe::class, InventarisTipe::field_primary(), self::field_id_type());
    }

    public function has_brand()
    {
        return $this->hasOne(Brand::class, Brand::field_primary(), self::field_id_brand());
    }

    public static function boot()
    {
        parent::creating(function ($model) {
            $code = request()->get($model->field_code());
            $model->{$model->field_code()} = !empty($code) ? $code : Query::autoNumber($model->getTable(), $model->field_code(), 'SN', 10);
            $model->{$model->field_active()} = 1;
        });

        parent::boot();
    }
}
