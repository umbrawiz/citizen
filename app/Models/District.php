<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'code', 'province_id'];
    protected $table = "districts";

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function wards()
    {
        return $this->hasMany(Ward::class, 'district_id');
    }

    public function villages()
    {
        return $this->hasManyThrough(Village::class, Ward::class, 'district_id', 'ward_id');
    }

    public function declarations()
    {
        return $this->hasManyThrough(Village::class, Ward::class, 'district_id')
            ->join('declarations', 'declarations.village_id', '=', 'villages.id')
            ->select('declarations.*');
    }
}
