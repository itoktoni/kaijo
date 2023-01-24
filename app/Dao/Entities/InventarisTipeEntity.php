<?php

namespace App\Dao\Entities;

trait InventarisTipeEntity
{
    public static function field_primary()
    {
        return 'it_id';
    }

    public function getFieldPrimaryAttribute()
    {
        return $this->{$this->field_primary()};
    }

    public static function field_name()
    {
        return 'it_nama';
    }

    public function getFieldNameAttribute()
    {
        return $this->{$this->field_name()};
    }
}
