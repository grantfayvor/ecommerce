<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function saveCategory(Request $request)
    {
        $rules = [
            'name' => 'required'
        ];
        $this->validate($request, $rules);
        if($this->categoryService->save($request)){
            return redirect('/admin/dashboard');
        } else {
            return back()->withInput();
        }
    }

    public function getAllCategories()
    {
        return response()->json($this->categoryService->getAllCategories());
    }

    public function deleteCategory($id)
    {
        return response()->json($this->categoryService->deleteCategory($id));
    }

    public function countCategories()
    {
        return response()->json($this->categoryService->countCategories());
    }
}
