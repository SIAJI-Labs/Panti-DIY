<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialAccount extends Model
{
    protected $fillable = [
        'platform_id', 'name', 'link'
    ];

    /**
     * Relation
     * 
     * (Foreign Key)
     */
    public function socialPlatform()
    {
        return $this->belongsTo('App\Models\SocialPlatform', 'platform_id');
    }
}
