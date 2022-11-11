$(document).ready(function () {

    //This is a global variable for setting type value after the type is selected;
    //It is used in post method inside the sent data
    let typeValueRes = "";
    let selectedType = 0;


    //Changing location without any save
    $("#cancelBtn").on("click", function () {
        window.location = "/index.php"
    })


    //On save button click, get input values and send to php file
    $("#saveBtn").on("click", function () {

        //Validation function is used to validate all the data is there is any missing value
        //or any input value that is not indicated type

        if (validate()) {

            //Data
            const sku = $("#sku").val();
            const name = $("#name").val();
            const price = $("#price").val();
            prodValue();
            
            //Post request
            $.ajax({
                url: "../Actions/post_action.php",
                type: "POST",
                data: {
                    sku: sku,
                    name: name,
                    price: price,
                    productType: selectedType,
                    typeValue: typeValueRes
                },
                success: function (result) {
                    console.log(result)
                    if (result != "") {
                        showErrMessage(result);
                    } 
                    else {
                        window.location = "/index.php"
                    }
                }
            });
        }
    })


    //Show relative field and input when the selected attribute changes
    $("#productType").change(function () {
        let id = $(this).children(":selected").attr("value");
        console.log(id);

        switch (id) {
            case "DVD":
                if ($("#dvdInput").hasClass("d-none")) {
                    $("#dvdInput").removeClass("d-none")
                }
                if (!$("#furnitureInput").hasClass("d-none")) {
                    $("#furnitureInput").addClass("d-none")
                }
                if (!$("#bookInput").hasClass("d-none")) {
                    $("#bookInput").addClass("d-none")
                }
                break;


            case "Furniture":
                if (!$("#dvdInput").hasClass("d-none")) {
                    $("#dvdInput").addClass("d-none")
                }
                if ($("#furnitureInput").hasClass("d-none")) {
                    $("#furnitureInput").removeClass("d-none")
                }
                if (!$("#bookInput").hasClass("d-none")) {
                    $("#bookInput").addClass("d-none")
                }
                break;

            case "Book":
                if (!$("#dvdInput").hasClass("d-none")) {
                    $("#dvdInput").addClass("d-none")
                }
                if (!$("#furnitureInput").hasClass("d-none")) {
                    $("#furnitureInput").addClass("d-none")
                }
                if ($("#bookInput").hasClass("d-none")) {
                    $("#bookInput").removeClass("d-none")
                }
                break;

            default:
                if (!$("#dvdInput").hasClass("d-none")) {
                    $("#dvdInput").addClass("d-none")
                }
                else if (!$("#furnitureInput").hasClass("d-none")) {
                    $("#furnitureInput").addClass("d-none")
                }
                else if (!$("#bookInput").hasClass("d-none")) {
                    $("#bookInput").addClass("d-none")
                }
                break;
        }

    });

    //Validation for inputs
    //More validation in php side
    function validate() {
        let missingValues = "Please, submit required data";
        let invalidData = "Please, provide the data of indicated type";

        if (!$("#sku").val() || !$("#name").val() || !$("#price").val()) {
            showErrMessage(missingValues);
            return false
        }

        else if (!$.isNumeric($("#price").val())) {
            invalidData += " (price)";
            showErrMessage(invalidData);
            return false
        }

        if ($("#productType").children(":selected").attr("value") == 0) {
            showErrMessage(missingValues);
            return false
        }



        if ($("#productType").children(":selected").attr("value") == "DVD" && !$("#size").val()) {
            showErrMessage(missingValues);
            return false
        }
        else if ($("#productType").children(":selected").attr("value") == "DVD" && !$.isNumeric($("#size").val())) {
            invalidData += " (Disk size)";
            showErrMessage(invalidData);
            return false
        }




        if ($("#productType").children(":selected").attr("value") == "Furniture" && (!$("#height").val() || !$("#width").val() || !$("#length").val())) {
            showErrMessage(missingValues);
            return false
        }
        else if ($("#productType").children(":selected").attr("value") == "Furniture" && (!$.isNumeric($("#width").val()) ||
            !$.isNumeric($("#height").val()) || !$.isNumeric($("#length").val()))) {
            invalidData += " (width/height or length)";
            showErrMessage(invalidData);
            return false;
        }




        if ($("#productType").children(":selected").attr("value") == "Book" && !$("#weight").val()) {
            showErrMessage(missingValues);
            return false
        }

        else if ($("#productType").children(":selected").attr("value") == "Book" && !$.isNumeric($("#weight").val())) {
            invalidData += " (Weight)";
            showErrMessage(invalidData);
            return false
        }

        else {
            showErrMessage("")
            return true
        }
    }


    //Showing error messages according to provided values
    function showErrMessage(err) {
        $(".errorMessage").html(err);
    }

    //Function to prepare text for the value of product type
    function prodValue() {
        let id = $("#productType").children(":selected").attr("value");

        if (id == "DVD") {
            let typeValue = $("#size").val()
            typeValueRes = typeValue;
            selectedType = 1;
        }
        else if (id == "Furniture") {
            let width = $("#width").val();
            let height = $("#height").val();
            let length = $("#length").val();
            let typeValue = width + "x" + height + "x" + length;
            typeValueRes = typeValue;
            selectedType = 2;
        }
        else if (id == "Book") {
            let typeValue = $("#weight").val();
            typeValueRes = typeValue;
            selectedType = 3;
        }
    }



});


