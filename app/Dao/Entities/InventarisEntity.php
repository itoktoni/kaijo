<?php

namespace App\Dao\Entities;

use App\Dao\Enums\BooleanType;

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

    public static function field_id_type()
    {
        return 'inventaris_id_tipe';
    }

    public function getFieldIdTypeAttribute()
    {
        return $this->{self::field_id_type()};
    }

    public static function field_id_brand()
    {
        return 'inventaris_id_brand';
    }

    public function getFieldIdBrandAttribute()
    {
        return $this->{self::field_id_brand()};
    }

    public static function field_id_instansi()
    {
        return 'inventaris_id_instansi';
    }

    public function getFieldIdInstansiAttribute()
    {
        return $this->{self::field_id_instansi()};
    }

    public static function field_id_name()
    {
        return 'inventaris_id_nama';
    }

    public function getFieldIdNameAttribute()
    {
        return $this->{self::field_id_name()};
    }

    public static function field_is_kalibrator()
    {
        return 'inventaris_is_kalibrator';
    }

    public function getFieldIsKalibratorAttribute()
    {
        return BooleanType::getDescription($this->{self::field_is_kalibrator()});
    }

    public static function field_is_asset()
    {
        return 'inventaris_is_asset';
    }

    public function getFieldIsAssetAttribute()
    {
        return BooleanType::getDescription($this->{self::field_is_asset()});
    }

}
