function openPopup(info) {
    document.getElementById("popup-text").innerText = info;
    document.getElementById("popup").style.display = "block";
}

function closePopup() {
    document.getElementById("popup").style.display = "none";
}


let cart = JSON.parse(sessionStorage.getItem('cart')) || [];


function addToCart(itemName, itemPrice, itemImage) {
    
    let existingItem = cart.find(item => item.name === itemName);

    if (existingItem) {
        existingItem.quantity++
    } else {
        const itemId = cart.length + 1;
        cart.push({ id: itemId, name: itemName, price: itemPrice, image: itemImage, quantity: 1 });
    }
    

    updateCart();
    
    // store updated cart in session storage
    sessionStorage.setItem('cart', JSON.stringify(cart));
}


function updateCart() {

    let cartElement = document.getElementById('cart');
    if (cartElement && window.location.pathname.endsWith('shop.html')) {

    cartElement.innerHTML = '';

    //have to be greater than 0 
    let itemsToShow = cart.filter(item => item.quantity > 0);

 
    itemsToShow.forEach(item => {
        let itemElement = document.createElement('div');
        itemElement.classList.add('grid-item', 'cart-item');
        itemElement.innerHTML = `
            <img src="assets/${item.image}" alt="${item.name}">
            <div class="caption">
                <div>${item.name}</div>
                <br/>
                <div>$${item.price}</div>
                <div class="quantity-controls">
                    <button onclick="decreaseQuantity(${item.id})">-</button>
                    <div class="quantity"><input type="text" value="${item.quantity}" readonly></div>
                    <button onclick="increaseQuantity(${item.id})">+</button>
                </div>
            </div>
        `;
        cartElement.appendChild(itemElement);
    });
}
}



function decreaseQuantity(itemId) {
    let itemIndex = cart.findIndex(item => item.id === itemId);
    if (itemIndex !== -1) {
        if (cart[itemIndex].quantity >= 1) {
            cart[itemIndex].quantity--;
            if (cart[itemIndex].quantity === 0) {
                cart.splice(itemIndex, 1);
            }
            updateCart(); // Update the cart display
            sessionStorage.setItem('cart', JSON.stringify(cart));
        }
    }
}


function increaseQuantity(itemId) {
    let itemIndex = cart.findIndex(item => item.id === itemId);
    if (itemIndex !== -1) {
        cart[itemIndex].quantity++;
        updateCart(); // Update the cart display
        sessionStorage.setItem('cart', JSON.stringify(cart));
    }
}
