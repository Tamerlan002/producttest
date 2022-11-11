<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="/Style/addProduct.css">
</head>

<body>



    <div class="container">

        <!-- Header starts -->

        <header class="mt-5">
            <div class="row">
                <div class="col-lg-6">
                    <h3>Products List</h3>
                </div>
                <div class="col-lg-6">
                    <div class="btnHolder d-flex justify-content-end">
                        <!-- Link could be used instead -->
                        <button class="btn btn-success mainBtns" id="saveBtn">
                            Save
                        </button>
                        <button class="btn btn-danger mainBtns" id="cancelBtn">
                            Cancel
                        </button>
                    </div>

                </div>
            </div>
            <hr>
        </header>


        <!-- Header ends -->

        <main class="mt-5">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12 formHolder">
                    <form action="" method="POST" id="product_form" autocomplete="off">
                        <!-- SKU section -->
                        <div class="row holder">
                            <div class="col-3 labelHolder">
                                <p><sup class="text-danger">*</sup>SKU:</p>
                            </div>
                            <div class="col-8 inputHolder">
                                <input type="text" placeholder="SKU" id="sku">
                            </div>
                        </div>

                        <!-- Name section -->
                        <div class="row holder">
                            <div class="col-3 labelHolder">
                                <p><sup class="text-danger">*</sup>Name:</p>
                            </div>
                            <div class="col-8 inputHolder">
                                <input type="text" placeholder="Name" id="name">
                            </div>

                        </div>


                        <!-- Price section -->
                        <div class="row holder">

                            <div class="col-3 labelHolder">
                                <p><sup class="text-danger">*</sup>Price:</p>
                            </div>
                            <div class="col-8 inputHolder">
                                <input type="text" placeholder="Price" id="price">
                            </div>
                        </div>

                        <!-- Type switcher section -->
                        <div class="row holder">
                            <div class="col-3 labelHolder">
                                <p><sup class="text-danger">*</sup>Type:</p>
                            </div>
                            <div class="col-8 inputHolder">
                                <select id="productType">
                                    <option value="0">Select</option>
                                    <option value="DVD" id="DVD">DVD</option>
                                    <option value="Furniture" id="Furniture">Furniture</option>
                                    <option value="Book" id="Book">Book</option>
                                </select>
                            </div>

                        </div>

                        <!-- DVD value input holder -->
                        <div class="row holder d-none" id="dvdInput">
                            <div class="col-3 labelHolder">
                                <p><sup class="text-danger">*</sup>Size:</p>
                            </div>
                            <div class="col-8 inputHolder">
                                <input type="text" placeholder="Size" id="size">
                            </div>
                            <small class="text-primary">Please, provide size in MB</small>
                        </div>
                        <!-- Furniture value input holder -->
                        <div class="row holder d-none" id="furnitureInput">
                            <div class="col-3 labelHolder">
                                <div class="row">
                                    <div class="col-12">
                                        <p><sup class="text-danger">*</sup>Width:</p>
                                    </div>
                                    <div class="col-12">
                                        <p><sup class="text-danger">*</sup>Height:</p>
                                    </div>
                                    <div class="col-12">
                                        <p><sup class="text-danger">*</sup>Length:</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-8 inputHolder">
                                <div class="row">
                                    <div class="col-12">
                                        <input type="text" placeholder="Width" id="width" class="mb-2">
                                    </div>
                                    <div class="col-12">
                                        <input type="text" placeholder="Height" id="height" class="mb-2">
                                    </div>
                                    <div class="col-12">
                                        <input type="text" placeholder="Length" id="length" class="mb-2">
                                    </div>
                                </div>

                            </div>
                            <small class="text-primary">Please, provide dimensions in cm</small>
                        </div>

                        <!-- Book value input holder -->
                        <div class="row holder d-none" id="bookInput">
                            <div class="col-3 labelHolder">
                                <p><sup class="text-danger">*</sup>Weight:</p>
                            </div>
                            <div class="col-8 inputHolder">
                                <input type="text" placeholder="Weight" id="weight">
                            </div>
                            <small class="text-primary">Please, provide weight in KG</small>
                        </div>
                        <div class="row ">
                            <p class="text-danger errorMessage"></p>
                        </div>

                        <!-- DVD -->

                    </form>
                </div>


            </div>
    </div>
    </main>
    <footer>

    </footer>
    </div>




    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="./Script/addProduct.js"></script>
</body>

</html>


<?php

include $_SERVER["DOCUMENT_ROOT"] . "/Connection/connection.php";


?>