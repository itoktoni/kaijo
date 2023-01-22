<?php

namespace App\Dao\Models;

use App\Dao\Builder\DataBuilder;
use App\Dao\Entities\LokasiCustomEntity;
use App\Dao\Traits\ActiveTrait;
use App\Dao\Traits\DataTableTrait;
use App\Dao\Traits\OptionTrait;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Mehradsadeghi\FilterQueryString\FilterQueryString as FilterQueryString;
use Plugins\Core;
use Plugins\Query;
use Touhidurabir\ModelSanitize\Sanitizable as Sanitizable;

class LokasiCustom extends Model
{
    use Sortable, FilterQueryString, Sanitizable, DataTableTrait, LokasiCustomEntity, ActiveTrait, OptionTrait;

    protected $table = 'lokasi_custom';
    protected $primaryKey = 'lc_id';

    protected $fillable = [
        'lc_id',
        'lc_nama',
        'lc_deskripsi',
    ];

    public $sortable = [
        'lc_nama',
        'lc_deskripsi',
    ];

    protected $casts = [
        'lc_id' => 'integer'
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
}
