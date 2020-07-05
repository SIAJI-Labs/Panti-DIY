<?php

namespace App\Models\Orphanage;

use Illuminate\Database\Eloquent\Model;

class OrphanageUpdate extends Model
{
    protected $fillable = [
        'orphanage_id',
        'writter',
        'editor',
        'title',
        'content',
        'date_update',
        'status'
    ];

    /**
     * Relation
     * 
     * (Primary Key)
     */
    public function orphanageUpdateLog()
    {
        return $this->belongsTo('App\Models\Orphanage\OrphanageUpdateLog', 'orphanage_update_id');
    }

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
