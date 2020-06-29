<?php

namespace App\Models\Orphanage;

use Illuminate\Database\Eloquent\Model;

class OrphanageUpdateLog extends Model
{
    protected $fillable = [
        'orphanage_update_id',
        'message'
    ];

    /**
     * Relation
     * 
     * (Foreign Key)
     */
    public function orphanageUpdate()
    {
        return $this->belongsTo('App\Models\OrphanageUpdate', 'orphanage_update_id');
    }
}
