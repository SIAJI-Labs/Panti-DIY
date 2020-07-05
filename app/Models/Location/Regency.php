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
        return $this->belongsTo('App\Models\Location\District', 'regency_id');
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
