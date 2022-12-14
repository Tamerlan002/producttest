<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="./Style/index.css">
    <!-- Bootstrap -->
</head>

<body>


    <div class="container mb-3">

        <!-- Header starts -->

        <header class="mt-5">
            <div class="row">
                <div class="col-lg-6">
                    <h3>Products List</h3>
                </div>
                <div class="col-lg-6">
                    <div class="btnHolder d-flex justify-content-end">
                        <!-- Link could be used instead -->
                        <button class="btn btn-success mainBtns" id="addBtn">
                            Add
                        </button>
                        <button class="btn btn-danger mainBtns" id="deleteBtn">
                            Mass Delete
                        </button>
                    </div>

                </div>
            </div>
            <hr>
        </header>

        <!-- Header finishes     -->

        <!-- Main starts -->
        <main class="mt-5">
            <div class="row" id="itemBoxHolder">

                <!-- Loaded with ajax request from js -->

            </div>
        </main>
        <!-- Main finishes -->


        <!-- Footer starts -->
        <footer>

        </footer>
        <!-- Footer finishes -->


    </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="./Script/index.js"></script>


</body>

</html>