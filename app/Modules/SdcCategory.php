<?php

namespace App\Modules;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SdcCategory extends Model
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
    protected $table = "sdc_categories";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name_vi','name_en','slug_vi','slug_en','publish'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['publish'];

    /**
     * Relationship with table sdc_posts.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function post(){
        return $this->hasOne('App\Modules\SdcPost');
    }
}
