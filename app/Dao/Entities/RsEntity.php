<?php

namespace App\Dao\Entities;

trait RsEntity
{
    public static function field_primary()
    {
        return 'rs_id';
    }

    public function getFieldPrimaryAttribute()
    {
        return $this->{$this->field_primary()};
    }

    public static function field_name()
    {
        return 'rs_nama';
    }

    public function getFieldNameAttribute()
    {
        return $this->{$this->field_name()};
    }

    public static function field_code()
    {
        return 'rs_kode';
    }

    public function getFieldCodeAttribute()
    {
        return $this->{$this->field_code()};
    }

    public static function field_description()
    {
        return 'rs_deskripsi';
    }

    public function getFieldDescriptionAttribute()
    {
        return $this->{$this->field_description()};
    }

    public static function field_phone()
    {
        return 'rs_telp';
    }

    public function getFieldPhoneAttribute()
    {
        return $this->{$this->field_phone()};
    }

    public static function field_email()
    {
        return 'rs_email';
    }

    public function getFieldEmailAttribute()
    {
        return $this->{self::field_email()};
    }

    public static function field_person()
    {
        return 'rs_kontak';
    }

    public function getFieldPersonAttribute()
    {
        return $this->{self::field_person()};
    }

    public static function field_active()
    {
        return 'rs_aktif';
    }

    public function getFieldActiveAttribute()
    {
        return $this->{self::field_active()};
    }

}
