<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'code', 'district_id'];
    protected $table = "wards";

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function villages()
    {
        return $this->hasMany(Village::class, 'ward_id');
    }

    public function declarations()
    {
        return $this->hasManyThrough(Declaration::class, Village::class, 'ward_id', 'village_id');
    }
}
