const csrf_token = document.head.querySelector('meta[name="csrf-token"]');
const notification = document.querySelector('#alert');
const totalPriceProducts = document.querySelectorAll('#totalPrice');
let productCount = new Map();

async function  addProductInput (id) {
    let input = document.querySelector(`#product-input-${id}`);
    input.value++;
    productCount.set(id, input.value);
    await sendServerAddProduct(id);
}

async function downSizeProductInput(id){
    let input = document.querySelector(`#product-input-${id}`);
    if(input.value < 2) return false;
    input.value--;
    productCount.set(id, input.value)
    await sendServerAddProduct(id);
}

async function sendServerAddProduct(id){
    try{
        let count = productCount.get(id);
        if(typeof count === "undefined"){
            let input = document.querySelector(`#product-input-${id}`);
            productCount.set(id, input);
            count = productCount.get(id);
        }
        let response = await fetch(`/user/basket/${id}/update`, {
            method: 'post',
            body: JSON.stringify({
                count: count
            }),
            headers: {
                'Content-Type': 'application/json',
                "X-CSRF-Token": csrf_token.content
            }
        }).then((res) => {
            res.json().then(function (data){
                let product = document.querySelector(`#product-id-${id}`).children;
                product.item(0).innerHTML = data.totalPrice;
            })
            updateBasket();
        })
    }catch (e) {
        console.log(e);
    }
}

// Быдлокод извините
function updateBasket(){
    let priceProducts = document.querySelectorAll('#card-total-price');
    let totalPriced = 0;
    priceProducts.forEach((item) => {
        totalPriced += Number(item.innerHTML)
    })
    totalPriceProducts.forEach((item) => {
        item.innerHTML = totalPriced + " P";
    })
}

updateBasket();
