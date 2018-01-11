<?php
/**
 * Created by PhpStorm.
 * User: Harrison
 */

namespace App\Repositories;


use App\Models\Category;

class CategoryRepository extends AbstractRepository{

    protected $model;

    public function __construct(Category $category)
    {
        $this->model = $category;
    }

}