<?php

namespace App\Dao\Models;

use App\Dao\Builder\DataBuilder;
use App\Dao\Entities\LokasiEntity;
use App\Dao\Traits\ActiveTrait;
use App\Dao\Traits\ApiTrait;
use App\Dao\Traits\DataTableTrait;
use App\Dao\Traits\OptionTrait;
use App\Http\Resources\LokasiResource;
use Illuminate\Database\Eloquent\Model;
use Kirschbaum\PowerJoins\PowerJoins;
use Kyslik\ColumnSortable\Sortable;
use Mehradsadeghi\FilterQueryString\FilterQueryString as FilterQueryString;
use PHPUnit\Framework\MockObject\Api;
use Plugins\Query;
use Touhidurabir\ModelSanitize\Sanitizable as Sanitizable;

class Lokasi extends Model
{
    use Sortable, FilterQueryString, Sanitizable, DataTableTrait, LokasiEntity, ActiveTrait, OptionTrait, PowerJoins, ApiTrait;

    protected $table = 'lokasi';
    protected $primaryKey = 'lokasi_id';

    protected $fillable = [
        'lokasi_id',
        'lokasi_kode',
        'lokasi_nama',
        'lokasi_id_custom',
        'lokasi_deskripsi',
    ];

    public $sortable = [
        'lokasi_nama',
        'lokasi_deskripsi',
    ];

    protected $casts = [
        'lokasi_id_custom' => 'integer'
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
            DataBuilder::build($this->field_custom_id())->name('ID Custom')->show(false)->sort(),
            DataBuilder::build(LokasiCustom::field_name())->name('Custom')->show()->sort(),
            DataBuilder::build($this->field_description())->name('Deskripsi')->show()->sort(),
        ];
    }

    public function apiTransform()
    {
        return LokasiResource::class;
    }

    public function has_custom()
    {
        return $this->hasOne(LokasiCustom::class, LokasiCustom::field_primary(), self::field_custom_id());
    }

    public static function boot()
    {
        parent::creating(function ($model) {
            $code = request()->get($model->field_code());
            $model->{$model->field_code()} = !empty($code) ? $code : Query::autoNumber($model->getTable(), $model->field_code(), 'L', 5);
            $model->{$model->field_active()} = 1;
        });

        parent::boot();
    }
}
