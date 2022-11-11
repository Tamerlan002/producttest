<?php

include $_SERVER["DOCUMENT_ROOT"] . "/Connection/connection.php";




//Product class
class Product
{
    //Props
    protected $id;
    protected $SKU;
    protected $name;
    protected $price;
    protected $productType;
    protected $typeValue;

    //Get and Set methods


    //ID
    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }
    //SKU
    public function getSKU()
    {
        return $this->SKU;
    }

    public function setSKU($SKU)
    {
        $this->SKU = $SKU;
    }

    //Name
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    //Price
    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    //Product Type
    public function getProductType()
    {
        return $this->productType;
    }


    public function setProductType($productType)
    {
        $this->productType = $productType;
    }

    //Type value
    public function getTypeValue()
    {
        return $this->typeValue;
    }

    public function setTypeValue($typeValue)
    {
        $this->typeValue = $typeValue;
    }
}


class responseProduct extends Product
{


    public function __construct($id, $sku, $name, $price, $productType, $typeValue)
    {
        $this->id = $id;
        $this->SKU = $sku;
        $this->name = $name;
        $this->price = $price;
        switch ($productType) {
            case 1:
                $this->productType = "DVD";
                $this->typeValue = $typeValue .= " MB";
                break;
            case 2:
                $this->productType = "Furniture";
                $this->typeValue = $typeValue .= " CM";
                break;
            case 3:
                $this->productType = "Book";
                $this->typeValue = $typeValue .= " KG";
                break;

            default:
                $this->productType = "No product type";
                break;
        }
    }

    public $id;
    public $SKU;
    public $name;
    public $price;
    public $productType;
    public $typeValue;
}


