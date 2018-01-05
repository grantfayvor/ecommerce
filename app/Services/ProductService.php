<?php
namespace App\Services;

use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Storage;

class ProductService
{

    private $repository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->repository = $productRepository;
    }

    public function findAllProducts()
    {
        return $this->repository->findAll();
    }

    public function countProducts()
    {
        return $this->repository->findAll()->count();
    }

    /*public function saveProduct($product, $image)
    {
        Storage::disk('public')->putFileAs('', $product->getImageLocation(), $image);
        return $this->repository->save($product);
    }*/

    public function save(Request $request)
    {
        $name = $request->name;
        $brand = $request->brand;
        $categoryId = $request->categoryId;
        $details = $request->details;
        $sellingPrice = $request->sellingPrice;
        $image = $request->file('image');
        $status = $request->status;
        $imageLocation = 'images/products/' .$name .'.jpg';
        $product = new Product();
        $product->setName($name);
        $product->setBrand($brand);
        $product->setCategoryId($categoryId);
        $product->setDetails($details);
        $product->setSellingPrice($sellingPrice);
        $product->setImageLocation($imageLocation);
        $product->setImageLocation($imageLocation);
        $product->setStatus($status);
        Storage::disk('product')->putFileAs('/', $image, $product->getImageLocation());
        return $this->repository->save($product->getAttributesArray());
    }

    public function update(Request $request, $id)
    {
        $name = $request->name;
        $brand = $request->brand;
        $categoryId = $request->categoryId;
        $details = $request->details;
        $sellingPrice = $request->sellingPrice;
        $image = $request->file('image');
        $status = $request->status;
        $imageLocation = 'images/products/' .$name .'.jpg';
        $product = new Product();
        $product->setName($name);
        $product->setBrand($brand);
        $product->setCategoryId($categoryId);
        $product->setDetails($details);
        $product->setSellingPrice($sellingPrice);
        $product->setImageLocation($imageLocation);
        $product->setImageLocation($imageLocation);
        $product->setStatus($status);
        Storage::disk('product')->putFileAs('/', $image, $product->getImageLocation());
        return $this->repository->update($id, $product->getAttributesArray());
    }

    public function findProductsByStatus($status)
    {
        return $this->repository->findByParam('status', $status);
    }

    public function findProductByCategory($category)
    {
        return $this->repository->findByParam('category_id', $category, 'http://localhost:8001/api/products/find?q=' .$category, 30);
    }

    public function searchByParam($param)
    {
        return $this->repository->search($param);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}