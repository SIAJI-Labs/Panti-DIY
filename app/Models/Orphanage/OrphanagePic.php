<?php

namespace App\Models\Orphanage;

use Illuminate\Database\Eloquent\Model;

class OrphanagePic extends Model
{
    // PIC Stand for Person In Charge (Contact Person)
    protected $fillable = [
        'orphanage_id',
        'name',
        'contact',
        'type'
    ];

    /**
     * Relation
     * 
     * (Foreign Key)
     */
    public function orphanage()
    {
        return $this->belongsTo('App\Models\Orphanage\Orphanage', 'orphanage_id');
    }
}
