<?php
/**
 * Created by Sondc.
 * Date: 05/05/2016
 * Time: 13:46
 */

namespace App\Repositories;

use App\Modules\SdcPost;

class PostRepository extends AbstractRepository{

    public function __construct(SdcPost $post)
    {
        $this->model = $post;
    }
}