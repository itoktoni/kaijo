<?php

namespace App\Dao\Models;

use App\Dao\Builder\DataBuilder;
use App\Dao\Entities\RuanganEntity;
use App\Dao\Traits\ActiveTrait;
use App\Dao\Traits\DataTableTrait;
use App\Dao\Traits\OptionTrait;
use Illuminate\Database\Eloquent\Model;
use Kirschbaum\PowerJoins\PowerJoins;
use Kyslik\ColumnSortable\Sortable;
use Mehradsadeghi\FilterQueryString\FilterQueryString as FilterQueryString;
use Touhidurabir\ModelSanitize\Sanitizable as Sanitizable;

class Ruangan extends Model
{
    use Sortable, FilterQueryString, Sanitizable, DataTableTrait, RuanganEntity, ActiveTrait, OptionTrait, PowerJoins;

    protected $table = 'ruangan';
    protected $primaryKey = 'ruangan_id';

    protected $fillable = [
        'ruangan_id',
        'ruangan_kode',
        'ruangan_nama',
        'ruangan_id_custom',
        'ruangan_deskripsi',
    ];

    public $sortable = [
        'ruangan_nama',
        'ruangan_deskripsi',
    ];

    protected $casts = [
        'ruangan_id_custom' => 'integer'
    ];

    protected $filteruangan = [
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
            DataBuilder::build($this->field_custom_id())->name('ID Custom')->show(false)->sort(),
            DataBuilder::build(RuanganCustom::field_name())->name('Custom')->show()->sort(),
            DataBuilder::build($this->field_description())->name('Deskripsi')->show()->sort(),
        ];
    }

    public function has_custom()
    {
        return $this->hasOne(RuanganCustom::class, RuanganCustom::field_primary(), self::field_custom_id());
    }
}
