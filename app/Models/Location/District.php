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
     * (Foreign Key)
     */
    public function regency()
    {
        return $this->belongsTo('App\Models\Location\Regency', 'regency_id');
    }
}
