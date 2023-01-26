<?php

namespace App\Dao\Models;

use App\Dao\Builder\DataBuilder;
use App\Dao\Entities\InstansiEntity;
use App\Dao\Traits\ActiveTrait;
use App\Dao\Traits\ApiTrait;
use App\Dao\Traits\DataTableTrait;
use App\Dao\Traits\OptionTrait;
use App\Http\Resources\InstansiResource;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Mehradsadeghi\FilterQueryString\FilterQueryString as FilterQueryString;
use Plugins\Core;
use Plugins\Query;
use Touhidurabir\ModelSanitize\Sanitizable as Sanitizable;

class Instansi extends Model
{
    use Sortable, FilterQueryString, Sanitizable, DataTableTrait, InstansiEntity, ActiveTrait, OptionTrait, ApiTrait;

    protected $table = 'instansi';
    protected $primaryKey = 'instansi_id';

    protected $fillable = [
        'instansi_id',
        'instansi_kode',
        'instansi_nama',
        'instansi_alamat',
        'instansi_deskripsi',
        'instansi_telp',
        'instansi_email',
        'instansi_kontak',
        'instansi_aktif',
    ];

    public $sortable = [
        'instansi_kode',
        'instansi_nama',
        'instansi_telp',
        'instansi_email',
        'instansi_kontak',
    ];

    protected $casts = [
        'instansi_aktif' => 'integer'
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
            DataBuilder::build($this->field_code())->name('Code')->sort(),
            DataBuilder::build($this->field_name())->name('Name')->show()->sort(),
            DataBuilder::build($this->field_peinstansion())->name('Kontak')->show()->sort(),
            DataBuilder::build($this->field_phone())->name('Phone')->show()->sort(),
            DataBuilder::build($this->field_email())->name('Email')->show()->sort(),
            DataBuilder::build($this->field_active())->name('Aktif')->show()->sort(),
        ];
    }

    public function apiTransform()
    {
        return InstansiResource::class;
    }

    public static function boot()
    {
        parent::creating(function ($model) {
            $model->{$model->field_code()} = Query::autoNumber($model->getTable(), $model->field_code(), 'RS', 6);
        });

        parent::boot();
    }

    public function has_lokasi()
    {
        return $this->belongsToMany(Lokasi::class, 'instansi_lokasi', 'instansi_id', 'lokasi_id');
    }

    public function has_inventaris()
    {
        return $this->hasMany(Inventaris::class, Inventaris::field_id_instansi(), self::field_code());
    }
}
