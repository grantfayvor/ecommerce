<?php
namespace App\Services;

// use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryService
{

    private $repository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->repository = $categoryRepository;
    }

    public function save($request)
    {
        $category = [
            'name' => $request->name
        ];
        return $this->repository->save($category);
    }

    public function getAllCategories()
    {
        return $this->repository->findAllUnPaged();
    }

    public function countCategories()
    {
        return $this->repository->findAllUnPaged()->count();
    }

    public function deleteCategory($id)
    {
        return $this->repository->delete($id);
    }

}