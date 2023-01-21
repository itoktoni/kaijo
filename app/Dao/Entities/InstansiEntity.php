<?php

namespace App\Dao\Entities;

trait InstansiEntity
{
    public static function field_primary()
    {
        return 'instansi_id';
    }

    public function getFieldPrimaryAttribute()
    {
        return $this->{$this->field_primary()};
    }

    public static function field_name()
    {
        return 'instansi_nama';
    }

    public function getFieldNameAttribute()
    {
        return $this->{$this->field_name()};
    }

    public static function field_code()
    {
        return 'instansi_kode';
    }

    public function getFieldCodeAttribute()
    {
        return $this->{$this->field_code()};
    }

    public static function field_description()
    {
        return 'instansi_deskripsi';
    }

    public function getFieldDescriptionAttribute()
    {
        return $this->{$this->field_description()};
    }

    public static function field_phone()
    {
        return 'instansi_telp';
    }

    public function getFieldPhoneAttribute()
    {
        return $this->{$this->field_phone()};
    }

    public static function field_email()
    {
        return 'instansi_email';
    }

    public function getFieldEmailAttribute()
    {
        return $this->{self::field_email()};
    }

    public static function field_peinstansion()
    {
        return 'instansi_kontak';
    }

    public function getFieldPeinstansionAttribute()
    {
        return $this->{self::field_peinstansion()};
    }

    public static function field_active()
    {
        return 'instansi_aktif';
    }

    public function getFieldActiveAttribute()
    {
        return $this->{self::field_active()};
    }

}
