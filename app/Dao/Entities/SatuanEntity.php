<?php

namespace App\Dao\Entities;

trait SatuanEntity
{
    public static function field_primary()
    {
        return 'satuan_id';
    }

    public function getFieldPrimaryAttribute()
    {
        return $this->{$this->field_primary()};
    }

    public static function field_name()
    {
        return 'satuan_nama';
    }

    public function getFieldNameAttribute()
    {
        return $this->{$this->field_name()};
    }

    public static function field_code()
    {
        return 'satuan_kode';
    }

    public function getFieldCodeAttribute()
    {
        return $this->{$this->field_code()};
    }

}
