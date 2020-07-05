<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    protected $fillable = [
        'district_id',
        'name',
    ];

    /**
     * Relation
     * 
     * (Primary Key)
     */
    public function orphanage()
    {
        return $this->hasMany('App\Models\Orphanage\Orphanage', 'village_id');
    }

    /**
     * Relation
     * 
     * (Foreign Key)
     */
    public function district()
    {
        return $this->belongsTo('App\Models\Location\District', 'district_id');
    }
}
