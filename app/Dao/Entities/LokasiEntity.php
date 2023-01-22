<?php

namespace App\Dao\Entities;

use App\Dao\Models\LokasiCustom;

trait LokasiEntity
{
    public static function field_primary()
    {
        return 'lokasi_id';
    }

    public function getFieldPrimaryAttribute()
    {
        return $this->{$this->field_primary()};
    }

    public static function field_name()
    {
        return 'lokasi_nama';
    }

    public function getFieldNameAttribute()
    {
        return $this->{$this->field_name()};
    }

    public static function field_code()
    {
        return 'lokasi_kode';
    }

    public function getFieldCodeAttribute()
    {
        return $this->{$this->field_code()};
    }

    public static function field_description()
    {
        return 'lokasi_deskripsi';
    }

    public function getFieldDescriptionAttribute()
    {
        return $this->{$this->field_description()};
    }

    public static function field_active()
    {
        return 'lokasi_aktif';
    }

    public function getFieldActiveAttribute()
    {
        return $this->{self::field_active()};
    }

    public static function field_custom()
    {
        return LokasiCustom::field_name();
    }

    public static function field_custom_id()
    {
        return 'lokasi_id_custom';
    }

    public function getFieldCustomIdAttribute()
    {
        return $this->{self::field_custom_id()};
    }

}
