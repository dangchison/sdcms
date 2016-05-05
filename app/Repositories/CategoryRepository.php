<?php
/**
 * Created by Sondc.
 * Date: 05/05/2016
 * Time: 13:34
 */

namespace App\Repositories;

use App\Modules\SdcCategory;

class CategoryRepository extends AbstractRepository{

    public function __construct(SdcCategory $category)
    {
        $this->model = $category;
    }
}