<?php

namespace App\Dao\Entities;

trait ListInventarisEntity
{
    public static function field_primary()
    {
        return 'list_inve_kode';
    }

    public function getFieldPrimaryAttribute()
    {
        return $this->{$this->field_primary()};
    }

    public static function field_name()
    {
        return 'list_inve_nama';
    }

    public function getFieldNameAttribute()
    {
        return $this->{$this->field_name()};
    }

    public static function field_code()
    {
        return 'list_inve_kode';
    }

    public function getFieldCodeAttribute()
    {
        return $this->{$this->field_code()};
    }

    public static function field_description()
    {
        return 'list_inve_deskripsi';
    }

    public function getFieldDescriptionAttribute()
    {
        return $this->{$this->field_description()};
    }

    public static function field_active()
    {
        return 'list_inve_aktif';
    }

    public function getFieldActiveAttribute()
    {
        return $this->{self::field_active()};
    }

}
