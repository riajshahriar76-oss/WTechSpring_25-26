const unitPrice = 1000;
const totalDays = 30;

const quantityInput = document.getElementById("quantity");
const totalPriceInput = document.getElementById("totalPrice");

quantityInput.addEventListener("input", calculateTotal);

function calculateTotal(){

    let quantity = parseInt(quantityInput.value) || 0;

    if(quantity < 0){
        alert("Quantity cannot be less than 0.");
        quantity = 0;
        quantityInput.value = 0;
    }

    let total = unitPrice * quantity * totalDays;

    totalPriceInput.value = total;

    if(total > 1000){
        alert("You are eligible for a gift coupon.");
    }
}
