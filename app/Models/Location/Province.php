<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $fillable = [
        'name'
    ];

    /**
     * Relation
     * 
     * (Primary Key)
     */
    public function regency()
    {
        return $this->hasMany('App\Models\Location\Regency', 'province_id');
    }
    public function orphanage()
    {
        return $this->hasMany('App\Models\Orphanage\Orphanage', 'province_id');
    }
}
