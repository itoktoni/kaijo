<?php

namespace App\Dao\Entities;

trait InventarisEntity
{
    public static function field_primary()
    {
        return 'inventaris_id';
    }

    public function getFieldPrimaryAttribute()
    {
        return $this->{$this->field_primary()};
    }

    public static function field_name()
    {
        return 'inventaris_sn';
    }

    public function getFieldNameAttribute()
    {
        return $this->{$this->field_name()};
    }

    public static function field_code()
    {
        return 'inventaris_sn';
    }

    public function getFieldCodeAttribute()
    {
        return $this->{$this->field_code()};
    }

    public static function field_description()
    {
        return 'inventaris_deskripsi';
    }

    public function getFieldDescriptionAttribute()
    {
        return $this->{$this->field_description()};
    }

    public static function field_active()
    {
        return 'inventaris_aktif';
    }

    public function getFieldActiveAttribute()
    {
        return $this->{self::field_active()};
    }

    public static function field_id_location()
    {
        return 'inventaris_id_lokasi';
    }

    public function getFieldIdLokasiAttribute()
    {
        return $this->{self::field_id_location()};
    }

    public static function field_id_name()
    {
        return 'inventaris_id_nama';
    }

    public function getFieldIdNameAttribute()
    {
        return $this->{self::field_id_name()};
    }

}
