<?php

namespace App\Models\Orphanage;

use Illuminate\Database\Eloquent\Model;

class OrphanageGallery extends Model
{
    protected $fillable = [
        'orphanage_id',
        'filename',
        'fullname',
        'filesize'
    ];

    /**
     * Relation
     * 
     * (Foreign Key)
     */
    public function orphanage()
    {
        return $this->belongsTo('App\Models\Orphanage', 'orphanage_id');
    }
}
