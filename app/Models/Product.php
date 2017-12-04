<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    private $name;
    private $brand;
    private $categoryId;
    private $details;
    // private $costPrice;
    private $sellingPrice;
    private $imageLocation;
    private $status;

    /*public function __construct($name, $brand, $categoryId, $details, $sellingPrice, $imageLocation)
    {
        $this->name = $name;
        $this->brand = $brand;
        $this->categoryId = $categoryId;
        $this->details = $details;
        $this->sellingPrice = $sellingPrice;
        $this->imageLocation = $imageLocation;
    }*/

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    public function getCategoryId()
    {
        return $this->categoryId;
    }

    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
    }

    public function getDetails()
    {
        return $this->details;
    }

    public function setDetails($details)
    {
        $this->details = $details;
    }

    public function getSellingPrice()
    {
        return $this->sellingPrice;
    }

    public function setSellingPrice($sellingPrice)
    {
        $this->sellingPrice = $sellingPrice;
    }

    public function getImageLocation()
    {
        return $this->imageLocation;
    }

    public function setImageLocation($imageLocation)
    {
        $this->imageLocation = $imageLocation;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getAttributesArray()
    {
        return [
            'name' => $this->name,
            'brand' => $this->brand,
            'category_id' => $this->categoryId,
            'details' => $this->details,
            'selling_price' => $this->sellingPrice,
            'image_location' => $this->imageLocation/*,
            'status' => $this->status*/
        ];
    }

}