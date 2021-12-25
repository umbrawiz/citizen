<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'code', 'ward_id'];
    protected $table = "villages";

    public function ward()
    {
        return $this->belongsTo(Ward::class, 'ward_id');
    }

    public function declarations()
    {
        return $this->hasMany(Declaration::class, 'village_id');
    }
}
