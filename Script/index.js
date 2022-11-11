$(document).ready(function () {
    
    //Function to load all the products when called
    function loadProducts(){
        $.ajax({
            url: "../Actions/get_action.php",
            type: "GET",
            success: function (result) {
                let resParse = JSON.parse(result);
    
                for (let i = 0; i < resParse.length; i++) {
    
                    $("#itemBoxHolder").append(
                        '<div class="col-lg-3">' +
                        '<div class="itemBox" id="' + resParse[i].id + '">' +
                        '<div class="itemBoxHeader">' +
                        '<input type="checkbox" class="delete-checkbox">' +
                        '</div>' +
                        '<div class="itemBoxBody justify-content-center">' +
                        '<p>' + resParse[i].SKU + '</p>' +
                        '<p>' + resParse[i].name + '</p>' +
                        '<p>' + resParse[i].price + '$</p>' +
                        '<p>' + resParse[i].productType + ': ' + resParse[i].typeValue + '</p>' +
                        '</div>' +
                        '</div>' +
                        '</div>'
    
                    )
                }
    
            },
            error: function (errMsg) {
                console.log(errMsg);
            }
        });
    }

    //Load data on body load
    loadProducts();


    // List to hold ids of products those will be deleted
    var deleteList = []



    //Checkbox check and add to list to delete for later
    $('body').on('click', '.itemBox', function (e) {
        var $checkbox = $(this).find('input:checkbox');
        $checkbox.prop('checked', !$checkbox.prop('checked'));

        if (!deleteList.includes(this.id)) {
            deleteList.push(this.id)
        }
        else {
            var index = deleteList.indexOf(this.id)
            deleteList.splice(index, 1)
        }

    });


    //Redirect to add product page
    $("#addBtn").on("click", function () {
        window.location = "/addproduct.php"
    })


    //Mass delete
    $("#deleteBtn").on("click", function(e){
        e.preventDefault();

        $.ajax({
            url: "../Actions/delete_action.php",
            type: "POST",
            data: {
                deleteProds: deleteList
            },
            success: function (result) {
                $("#itemBoxHolder").html("");
                loadProducts();
            },
            error: function (errMsg) {
                console.log(errMsg);
            }
        });

    })




});