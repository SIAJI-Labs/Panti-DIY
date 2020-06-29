<?php

namespace App\Models\Orphanage;

use Illuminate\Database\Eloquent\Model;

class Orphanage extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'logo'
    ];

    /**
     * Relation
     * 
     * (Primary Key)
     */
    public function orphanageGallery()
    {
        return $this->belongsTo('App\Models\OrphanageGallery', 'orphanage_id');
    }
    public function orphanagePic()
    {
        return $this->belongsTo('App\Models\OrphanagePic', 'orphanage_id');
    }
    public function orphanageUpdate()
    {
        return $this->belongsTo('App\Models\OrphanageUpdate', 'orphanage_id');
    }
}
