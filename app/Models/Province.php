<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'code'];
    protected $table = "provinces";

    public function districts()
    {
        return $this->hasMany(District::class, 'province_id');
    }

    public function wards()
    {
        return $this->hasManyThrough(Ward::class, District::class, 'province_id', 'district_id');
    }

    public function villages()
    {
        return $this->hasManyThrough(Ward::class, District::class, 'province_id')
            ->join('villages', 'villages.ward_id', '=', 'wards.id')
            ->select('villages.*');
    }

    public function declarations()
    {
        return $this->hasManyThrough(Ward::class, District::class, 'province_id')
            ->join('villages', 'villages.ward_id', '=', 'wards.id')
            ->join('declarations', 'declarations.village_id', '=', 'villages.id')
            ->select('declarations.*');
    }
}
