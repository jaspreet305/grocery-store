//Global variables
let subtotal_value = 0;
let taxes_value = 0;
let total_value = 0;

//Display total function which displays the subtotal, taxes and total
function displayTotal() {
    let subtotal = document.getElementById('subtotal')
    let taxes = document.getElementById('taxes')
    let total = document.getElementById('total')
    calculateTotal();
    subtotal.innerText = "$" + subtotal_value.toFixed(2);
    taxes.innerText = "$" + taxes_value.toFixed(2);
    total.innerText = "$" + total_value.toFixed(2);
}

//Display total function which calculates the subtotal, taxes and total
function calculateTotal() {
    let prices = document.getElementsByClassName('element-price');
    subtotal_value = 0;
    for (let i = 0; i < prices.length; i++) {
        let value = prices[i].textContent.substr(1, prices[i].textContent.length);
        prices[i].textContent = "$" + parseFloat(value).toFixed(2);
        subtotal_value += parseFloat(value);
    }
    taxes_value = subtotal_value * 0.15;
    total_value = subtotal_value + taxes_value;
}

//Deletes an item of the cart and recalculates the total
function removeElement(e) {
    e.parentElement.parentElement.parentElement.remove();
    displayTotal();
    displayNumberOfItems();
    let id = e.parentElement.querySelector('input[name="id"]')
    $.ajax(
        'updateCart.php',
        {
            type: "POST",
            data: {
                action: 'remove',
                id: id.value
            },
            success: function(data) {

            },
            error: function() {
            }
        }
    );
}

//Functions that changes the count of an item in the cart and recalculates the total
function changeCount(e) {
    let isPlus = true;
    if(e.getAttribute('name') === "minus")
        isPlus = false;

    let number = e.parentElement.querySelector('.number-selector')
    let unitary = e.parentElement.querySelector('input[name="unitary"]')
    let id = e.parentElement.parentElement.querySelector('input[name="id"]')
    let price = e.parentElement.parentElement.querySelector('span[name="price"]')

    if(number.value === "1" && !isPlus) return;
    if(number.value === "9" && isPlus) return;

    number.value = (isPlus) ? (parseInt(number.value)+1): (parseInt(number.value)-1);
    price.textContent = "$" + (parseFloat(unitary.value) * number.value).toFixed(2);
    displayTotal();
    $.ajax(
        'updateCart.php',
        {
            type: "POST",
            data: {
                action: (isPlus) ? "add" : "minus",
                id: id.value
            },
            success: function(data) {

            },
            error: function() {
            }
        }
    );
}

//Form validation for the checkout button
function checkCheckout(){
    let card_number = document.getElementById("card-number");
    let card_holder = document.getElementById("card-holder");
    let expires = document.getElementById("expires");
    let cvc = document.getElementById("cvc");

    let has_error = false;
    if(card_number.value.length !== 16){
        card_number.style = "border: solid red";
        has_error = true;
    }else {
        card_number.style = "border: none";
    }
    if(card_holder.value.length < 5){
        card_holder.style = "border: solid red";
        has_error = true;
    }else {
        card_holder.style = "border: none";
    }
    if(!/^(0[1-9]|1[0-2])\/([0-9]{2})$/g.test(expires.value)){
        expires.style = "border: solid red";
        has_error = true;
    }else {
        expires.style = "border: none";
    }
    if(cvc.value.length !== 3){
        cvc.style = "border: solid red";
        has_error = true;
    }else {
        cvc.style = "border: none";
    }
    if(!has_error){
        $.ajax(
            'placeOrder.php',
            {
                type: "POST",
                data: {
                    total: total_value
                },
                success: function(data) {
                    var text = "Order with id " + data + " was placed successfully!";
                    swal({
                        title : 'Success',
                        text : text,
                        icon: 'success',
                        // buttons: ["Continue shopping", "Go to cart"],
                        buttons: {
                            confirm: 'Go to Home',
                        },
                    }).then((value) => {
                            switch (value) {
                                default:
                                    location.href = '../index.php';
                                    break;

                            }
                        })
                },
                error: function() {
                }
            }
        );
    }
}



//Displays the "You have n items in your cart" message appropriately
function displayNumberOfItems(){
    let items = document.getElementsByClassName('uk-card full-width uk-card-default')
    let numOfItems = document.getElementById('number-of-items');
    numOfItems.innerText = items.length + " item" + ((items.length!==1) ? 's' : '');
}

//First calls to the functions (when the user opens the page)
displayTotal();
displayNumberOfItems();