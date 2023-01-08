<?php

namespace App\Dao\Models;

use App\Dao\Builder\DataBuilder;
use App\Dao\Entities\RuanganCustomEntity;
use App\Dao\Traits\ActiveTrait;
use App\Dao\Traits\DataTableTrait;
use App\Dao\Traits\OptionTrait;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Mehradsadeghi\FilterQueryString\FilterQueryString as FilterQueryString;
use Plugins\Core;
use Plugins\Query;
use Touhidurabir\ModelSanitize\Sanitizable as Sanitizable;

class RuanganCustom extends Model
{
    use Sortable, FilterQueryString, Sanitizable, DataTableTrait, RuanganCustomEntity, ActiveTrait, OptionTrait;

    protected $table = 'ruangan_custom';
    protected $primaryKey = 'rc_id';

    protected $fillable = [
        'rc_id',
        'rc_nama',
        'rc_deskripsi',
    ];

    public $sortable = [
        'rc_nama',
        'rc_deskripsi',
    ];

    protected $casts = [
        'rc_id' => 'integer'
    ];

    protected $filterc = [
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
