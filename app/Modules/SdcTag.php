<?php

namespace App\Modules;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SdcTag extends Model
{
    use SoftDeletes;

    /**
     * PUBLISHED type
     */
    const PUBLISHED = 1;

    /**
     * UNPUBLISHED type
     */
    const UNPUBLISHED = 0;

    /**
     * Name table
     *
     * @var string
     */
    protected $table = "sdc_tags";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name_vi', 'name_en', 'publish' ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [ 'publish' ];

    /**
     * Relationship with table sdc_posts.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts(){
        return $this->belongsToMany('App\Modules\SdcPost','sdc_post_tags');
    }
}
