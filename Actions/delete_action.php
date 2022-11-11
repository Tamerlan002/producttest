<?php

//Includes
include $_SERVER["DOCUMENT_ROOT"] . "/Connection/connection.php";
include $_SERVER["DOCUMENT_ROOT"] . "/Model/product.php";



if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $deleteList = [];

    if (isset($_POST['deleteProds'])) {
        $deleteList = $_POST['deleteProds'];


        foreach ($deleteList as $id) {
            $sql = "DELETE FROM `products` WHERE id=$id";
            $conn->query($sql);
        }

        echo "deleted successfully";
    }
}
