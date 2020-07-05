<?php

namespace App\Models\Orphanage;

use Illuminate\Database\Eloquent\Model;

class Orphanage extends Model
{
    protected $fillable = [
        'province_id',
        'regency_id',
        'district_id',
        'village_id',

        'name',
        'slug',
        'description',
        'logo'
    ];

    /**
     * Relation
     * 
     * (Foreign Key)
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

    public function province()
    {
        return $this->belongsTo('App\Models\Location\Province', 'province_id');
    }
    public function regency()
    {
        return $this->belongsTo('App\Models\Location\Regency', 'regency_id');
    }
    public function district()
    {
        return $this->belongsTo('App\Models\Location\District', 'district_id');
    }
    public function village()
    {
        return $this->belongsTo('App\Models\Location\Village', 'village_id');
    }
}
