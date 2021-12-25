<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Declaration extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['identity_card', 'name', 'birthday', 'sex', 'country', 'permanent_address', 'temporary_address', 'religion', 'education', 'job', 'village_id'];
    protected $table = "declarations";

    public function villages()
    {
        return $this->belongsTo(Village::class, 'village_id', 'id');
    }
}
