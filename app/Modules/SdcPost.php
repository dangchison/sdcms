<?php

namespace App\Modules;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SdcPost extends Model
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
    protected $table = "sdc_posts";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title_vi',
        'title_en',
        'description_vi',
        'description_en',
        'content_vi',
        'content_en',
        'slug_vi',
        'slug_en',
        'views',
        'favorite',
        'publish',
        'sdc_category_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [ 'publish', 'sdc_category_id' ];

    /**
     * Relationship with table sdc_categories..
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(){
        return $this->belongsTo('App\Modules\SdcCategory');
    }

    /**
     * Realationship with table sdc_tags
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags(){
        return $this->belongsToMany('App\Modules\SdcTag','sdc_post_tags');
    }
}
