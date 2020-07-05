<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = [
        'regency_id',
        'name'
    ];

    /**
     * Relation
     * 
     * (Primary Key)
     */
    public function village()
    {
        return $this->hasMany('App\Models\Location\Village', 'district_id');
    }
    public function orphanage()
    {
        return $this->hasMany('App\Models\Orphanage\Orphanage', 'district_id');
    }
    
    /**
     * Relation
     * 
     * (Foreign Key)
     */
    public function regency()
    {
        return $this->belongsTo('App\Models\Location\Regency', 'regency_id');
    }
}
