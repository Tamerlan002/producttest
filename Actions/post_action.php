<?php
include $_SERVER["DOCUMENT_ROOT"] . "/Connection/connection.php";
include $_SERVER["DOCUMENT_ROOT"] . "/Model/product.php";


//POST Mehthod

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //Before getting instance of Product lets be sure that we dont have that sku in database

    $checkSKU = $_POST['sku'];
    $sqlToCheckSKU = "SELECT * FROM `products` WHERE sku='" . $checkSKU . "'";
    $response = $conn->query($sqlToCheckSKU);

    //If not any match, add new product, else throw an exception

    if (!$response->num_rows == 1) {
        //Validation before setting values

        //SKU
        if (empty($_POST['sku'])) {
            try {
                throw new Exception("Provide valid value for SKU");
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
        //NAME
        elseif (empty($_POST['name'])) {
            try {
                throw new Exception("Provide valid value for name");
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
        //PRICE
        elseif (empty($_POST['price']) || !is_numeric($_POST['price'])) {
            try {
                throw new Exception("Provide valid value for price, do not include '$'");
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
        //PRODUCT TYPE
        elseif (empty($_POST['productType']) || !is_numeric($_POST['productType'])) {
            try {
                throw new Exception("Please choose product type");
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
        //TYPE VALUE
        elseif (empty($_POST['typeValue'])) {
            try {
                throw new Exception("Provide valid value for type you have choosen");
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        } 
        else {
            $product = new Product();
            $product->setSKU($_POST['sku']);
            $product->setName($_POST['name']);
            $product->setPrice($_POST['price']);
            $product->setProductType($_POST['productType']);
            $product->setTypeValue($_POST['typeValue']);

            $sql = "INSERT INTO `products` (sku, name, price, productType, typeValue)
            VALUES ('" . $product->getSKU() . "', '" . $product->getName() . "', '" . $product->getPrice() . "', '" . $product->getProductType() .
                "', '" . $product->getTypeValue() . "')";

            $conn->query($sql);
        }
    } 
    //We need to throw exception about duplicate value for sku
    else {
        try {
            throw new Exception("There is already product with that info in the database");
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
