<?php

namespace App\Dao\Models;

use App\Dao\Builder\DataBuilder;
use App\Dao\Entities\RsEntity;
use App\Dao\Traits\ActiveTrait;
use App\Dao\Traits\DataTableTrait;
use App\Dao\Traits\OptionTrait;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Mehradsadeghi\FilterQueryString\FilterQueryString as FilterQueryString;
use Plugins\Core;
use Plugins\Query;
use Touhidurabir\ModelSanitize\Sanitizable as Sanitizable;

class Rs extends Model
{
    use Sortable, FilterQueryString, Sanitizable, DataTableTrait, RsEntity, ActiveTrait, OptionTrait;

    protected $table = 'rs';
    protected $primaryKey = 'rs_id';

    protected $fillable = [
        'rs_id',
        'rs_kode',
        'rs_nama',
        'rs_alamat',
        'rs_deskripsi',
        'rs_telp',
        'rs_email',
        'rs_kontak',
        'rs_aktif',
    ];

    public $sortable = [
        'rs_kode',
        'rs_nama',
        'rs_telp',
        'rs_email',
        'rs_kontak',
    ];

    protected $casts = [
        'rs_aktif' => 'integer'
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
            DataBuilder::build($this->field_person())->name('Kontak')->show()->sort(),
            DataBuilder::build($this->field_phone())->name('Phone')->show()->sort(),
            DataBuilder::build($this->field_email())->name('Email')->show()->sort(),
            DataBuilder::build($this->field_active())->name('Aktif')->show()->sort(),
        ];
    }

    public static function boot()
    {
        parent::creating(function ($model) {
            $model->{$model->field_code()} = Query::autoNumber($model->getTable(), $model->field_code(), 'RS');
        });

        parent::boot();
    }

    public function has_ruangan()
    {
        return $this->belongsToMany(Ruangan::class, 'rs_ruangan', 'rs_id', 'ruangan_id');
    }
}
