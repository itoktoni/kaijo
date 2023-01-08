<?php

namespace App\Dao\Entities;

trait RuanganEntity
{
    public static function field_primary()
    {
        return 'ruangan_id';
    }

    public function getFieldPrimaryAttribute()
    {
        return $this->{$this->field_primary()};
    }

    public static function field_name()
    {
        return 'ruangan_nama';
    }

    public function getFieldNameAttribute()
    {
        return $this->{$this->field_name()};
    }

    public static function field_code()
    {
        return 'ruangan_kode';
    }

    public function getFieldCodeAttribute()
    {
        return $this->{$this->field_code()};
    }

    public static function field_description()
    {
        return 'ruangan_deskripsi';
    }

    public function getFieldDescriptionAttribute()
    {
        return $this->{$this->field_description()};
    }

    public static function field_active()
    {
        return 'ruangan_aktif';
    }

    public function getFieldActiveAttribute()
    {
        return $this->{self::field_active()};
    }

    public static function field_custom_id()
    {
        return 'ruangan_id_custom';
    }

    public function getFieldCustomIdAttribute()
    {
        return $this->{self::field_custom_id()};
    }

}
