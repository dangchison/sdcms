<?php
/**
 * Created by Sondc.
 * Date: 05/05/2016
 * Time: 13:55
 */

namespace App\Repositories;

use App\Modules\SdcTag;

class TagRepository extends AbstractRepository{

    public function __construct(SdcTag $tag)
    {
        $this->model = $tag;
    }
}