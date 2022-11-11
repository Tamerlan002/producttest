<?php
include $_SERVER["DOCUMENT_ROOT"] . "/Connection/connection.php";
include $_SERVER["DOCUMENT_ROOT"] . "/Model/product.php";


$sql = "SELECT * FROM `products`";

$result = $conn->query($sql);

$productList = array();

while ($row = $result->fetch_assoc()) {
    $product = new Product();
    $product->setId($row["Id"]);
    $product->setSKU($row["SKU"]);
    $product->setName($row["name"]);
    $product->setPrice($row["price"]);
    $product->setProductType($row["productType"]);
    $product->setTypeValue($row["typeValue"]);


    $responseId = $product->getId();
    $responseSKU = $product->getSKU();
    $responseName = $product->getName();
    $responsePrice = $product->getPrice();
    $responseProdType = $product->getProductType();
    $responseTypeVal = $product->getTypeValue();


    $responseProduct = new responseProduct($responseId, $responseSKU, $responseName, $responsePrice, $responseProdType, $responseTypeVal);


    $productList[] = clone ($responseProduct);
}


//GET Method



if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    echo json_encode($productList, false);
}



?>