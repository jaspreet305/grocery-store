$( document ).ready(function() {
    let inputObject = document.getElementById("input");
    var productName = $("#title").text();
    let e;
    var value = 1;

    var price = parseFloat($("#productPrice").text());
    var totalPrice = parseFloat(value)*price;
    var estPrice = "estimated total : $" + totalPrice;

    console.log(productName);

    $(".plus").on("click",function(e){
        if(value === 9){
            value=9;
        }
        else{
            value++;
        }
        document.getElementById("input").value = value;

        price = parseFloat($("#productPrice").text());
        totalPrice = parseFloat(value)*price;
        estPrice = "estimated total : $" + totalPrice.toFixed(2);

        $("#change").html(estPrice);
        console.log(estPrice);

    })

    $(".minus").on("click", function(e){
        if(value === 1){
            value = 1
            document.getElementById("input").value = value;
        }
        else{
            value--;
            document.getElementById("input").value = value;

            price = parseFloat($("#productPrice").text());
            totalPrice = parseFloat(value)*price;
            estPrice = "estimated total : $" + totalPrice.toFixed(2);

            $("#change").html(estPrice);
            console.log(estPrice);

        }
        console.log(value);
    })


    var isLogged = false;
    if($("#logged").text()==="true"){
        isLogged = true;
    }
    else{
        isLogged = false;
    }

    $(".add").on("click", function(){

        if(isLogged) {
            $.ajax(
                '../../cart/updateCart.php',
                {
                    type: "POST",
                    data: {
                        action: "set",
                        value: value,
                        id: $("#id").text()
                    },
                    success: function (data) {
                    },
                    error: function () {
                    }
                }
            );
            var text = "Added " + value + " " + productName + " to the cart!";
            swal({
                title: 'Success',
                text: text,
                icon: 'success',
                buttons: {
                    cancel: "Continue shopping",
                    defeat: 'Go to cart',
                },
            })
                .then((value) => {
                    switch (value) {

                        case "defeat":

                            $.ajax({

                                url: "../../cart/cart.php",

                                success: function (data) {
                                    location.href = '../../cart/cart.php';
                                }
                            })
                            break;

                        case "cancel":
                            break;
                    }
                })
        }

        else{

            swal({
                title: 'You are not logged in!',
                text: 'Please sign in or create an account',
                icon: 'warning',
                buttons: {
                    catch: "Sign In",
                    defeat: 'Register',
                },
            })
                .then((value) => {
                    switch (value) {

                        case "defeat":

                            $.ajax({

                                url: "../../register/signup.php",

                                success: function (data) {
                                    location.href = '../../register/signup.php';
                                }
                            })
                            break;

                        case "catch":
                            $.ajax({

                                url: "../../register/signin.php",

                                success: function (data) {
                                    location.href = '../../register/signin.php';
                                }
                            })
                            break;
                    }
                })

        }
    })
});