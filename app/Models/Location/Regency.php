<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Model;

class Regency extends Model
{
    protected $fillable = [
        'province_id',
        'name'
    ];

    /**
     * Relation
     * 
     * (Primary Key)
     */
    public function district()
    {
        return $this->hasMany('App\Models\Location\District', 'regency_id');
    }
    public function orphanage()
    {
        return $this->hasMany('App\Models\Orphanage\Orphanage', 'regency_id');
    }

    /**
     * Relation
     * 
     * (Foreign Key)
     */
    public function province()
    {
        return $this->belongsTo('App\Models\Location\Province', 'province_id');
    }
}
