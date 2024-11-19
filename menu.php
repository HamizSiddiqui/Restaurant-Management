<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        .bgcolor {
            background-image: url(https://images.pexels.com/photos/326333/pexels-photo-326333.jpeg);
            background-position: center;
            background-size: cover;
            background-repeat: none;
        }

        .navcolor {
            background-color: #004e92;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .cart-container {
            position: relative;
            display: inline-block;
        }

        .icon {
            font-size: 2rem;
            color: black;
        }

        .counter-controls {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 10px;
            gap: 10px;
        }

        .counter-value {
            font-size: 1.5rem;
            font-weight: bold;
        }

        button {
            font-size: 1.2rem;
            padding: 5px 10px;
            border: none;
            background-color: #f1f1f1;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #ddd;
        }

        #cart-counter {
            position: absolute;
            top: -8px;
            right: -12px;
            background-color: red;
            color: white;
            font-size: 0.8rem;
            font-weight: bold;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .cart-items {
            list-style-type: none;
            padding: 0;
        }

        .cart-items li {
            padding: 10px;
            margin: 5px 0;
            border-bottom: 1px solid #ccc;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .remove-btn {
            cursor: pointer;
            color: red;
            font-weight: bold;
        }

        .quantity {
            font-weight: bold;
            margin-left: 10px;
        }

        .counter {
            font-size: 1.5rem;
            font-weight: bold;
        }

    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body>

    <?php include '_dbconnect.php';?>

    <!-- navbar start -->
    <div class="container-fluid sec-1 ">
        <div class='wrapper'>
            <?php include 'navbar.php';?>
        </div>
    </div>
    <!-- navbar end -->

    <!-- Cards Start -->
    <section class="sec-m2 bgcolor" style="min-height: 600px;">
        <nav class="navbar">
            <form class="container-fluid justify-content-center ">

                <?php 
                    $sql="SELECT * FROM `categories`";
                    $result=mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_assoc($result)){
                        echo '<a href="#'.$row['Category_id'].'"><button class="btn mt-3 btn-sm btn-outline-light py-2 px-4 mx-4 fw-bold" type="button">'. $row['Category_name'] .'</button></a>';
                    }                    
                ?>
            </form>
        </nav>

        <div class="container">
            <div class="row pt-5">
                <?php 
                    $sql="SELECT * FROM `categories`";
                    $result=mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_assoc($result)){
                        echo '<h1 id='.$row['Category_id'].' class="text-light pt-3 mb-3">'.$row['Category_name'].'</h1>';
                        $category_id=$row['Category_id'];
                        $sql2="SELECT * FROM `items` where cat_id=$category_id";
                        $result2=mysqli_query($conn,$sql2);
                        $numRows = mysqli_num_rows($result2);
                        while($row2=mysqli_fetch_assoc($result2)){
                            echo '
                            <div class="col-12 col-md-3 d-inline-block width="80px">
                                <div class="card" style="width: 16rem;">
                                    <img src="'.$row2['Item_image'].'" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold">'. $row2['Item_name'] .'</h5>
                                        <p class="card-text">'. substr($row2['Item_description'], 0, 80) .'...
                                        <div class="d-flex justify-content-between align-items-center">
                                            <a href="#" class="see-more" id="see-more" data-bs-toggle="modal" data-bs-target="#exampleModal" 
                                                data-id="'. $row2['Item_id'] .'" data-name="'. $row2['Item_name'] .'" 
                                                data-description="'. $row2['Item_description'] .'">See More</a>
                                            <h6 class="mb-0">Price: '.$row2['Price'].'</h6>
                                        </div>
                                        <div class="counter-controls">
                                            <button type="button" class="btn btn-danger mx-4 px-4"  onclick="updateQuantity(\''.$row2['Item_id'].'\', -1, \''.$row2['Item_name'].'\')" style="font-size: 30px height: 20px">-</button>
                                            <span id="quantity-'.$row2['Item_id'].'" class="counter">0</span>
                                            <button type="button" class="btn btn-success px-4" onclick="updateQuantity(\''.$row2['Item_id'].'\', 1, \''.$row2['Item_name'].'\')" style="font-size: 30px height: 20px">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>';

                        }
                        if($numRows == 0){
                            echo '<h1 class="text-light mb-3" style="font-size: 20px;">No Results Found</h1>';
                        }
                    }        
                ?>
            </div>
        </div>
    </section>

    <!-- See more Modal Starts -->
    <?php include 'cardmodal.php';?>
    <script src="modal.js"></script>
    <!-- See more Modal Ends -->


    <!-- Basket Modal Starts -->
<div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cartModalLabel">Shopping Cart</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Cart Items List -->
                <ul id="cartItems" class="list-group mb-3">
                    <!-- Cart items will be dynamically added here -->
                </ul>
                <p id="cartEmptyMessage" class="text-muted">Your cart is empty. Add items to see them here.</p>

                <!-- Total Price Section -->
                <div class="d-flex justify-content-between">
                    <strong>Total:</strong>
                    <span id="cartTotalPrice">0.00</span> USD
                </div>
            </div>
            <div class="modal-footer">
                <!-- Hidden Form to Send Cart Data -->
                <form id="cartForm" method="POST" action="order.php">
                    <input type="hidden" name="cartData" id="cartDataInput">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="checkoutButton" onclick="submitCart()">Go to Checkout</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Basket Modal Ends -->


    <!-- Checkout Button Starts -->
    <!-- <script>
        function submitCart() {
            const cartDataInput = document.getElementById('cartDataInput');
            cartDataInput.value = JSON.stringify(cart); // Serialize cart object as a JSON string
            document.getElementById('cartForm').submit(); // Submit the form to order.php
        }
    </script> -->
    <!-- Checkout Button Ends-->

    <!-- Card Java Starts -->
    <script>
    let cart = {}; // Object to store cart items and quantities

// Play a notification sound
const notificationSound = new Audio('notification.mp3'); // Ensure this file exists in your project

// Update item quantity
function updateQuantity(itemId, change, itemName, price) {
    notificationSound.play();

    // Initialize cart item if it doesn't exist
    if (!cart[itemId]) {
        cart[itemId] = { quantity: 0, name: itemName, price: price };
    }

    // Update quantity
    cart[itemId].quantity += change;

    // Remove item if the quantity is zero or less
    if (cart[itemId].quantity <= 0) {
        delete cart[itemId];
    }

    // Update the quantity display on the card
    const itemElement = document.getElementById("quantity-" + itemId);
    if (itemElement) {
        itemElement.innerText = cart[itemId]?.quantity || 0;
    }

    // Update the modal and cart counter
    updateModal();
    updateCartCounter();
}

// Update the cart modal content
function updateModal() {
    const cartItems = document.getElementById('cartItems');
    const cartEmptyMessage = document.getElementById('cartEmptyMessage');
    const cartTotalPriceElement = document.getElementById('cartTotalPrice');
    let totalPrice = 0;

    cartItems.innerHTML = ''; // Clear current cart content

    if (Object.keys(cart).length === 0) {
        cartEmptyMessage.style.display = 'block';
        cartTotalPriceElement.innerText = '0.00'; // Reset total price
    } else {
        cartEmptyMessage.style.display = 'none';

        // Populate cart modal with items
        for (const itemId in cart) {
            const itemTotal = cart[itemId].price * cart[itemId].quantity;
            totalPrice += itemTotal;

            const listItem = document.createElement('li');
            listItem.className = 'list-group-item d-flex justify-content-between align-items-center';
            listItem.innerHTML = `
                <div>
                    <strong>${cart[itemId].name}</strong><br>
                    $${cart[itemId].price} x ${cart[itemId].quantity}
                </div>
                <div>
                    <span>$${itemTotal.toFixed(2)}</span>
                    <button class="btn btn-sm btn-danger ms-2" onclick="removeFromCart('${itemId}')">Remove</button>
                </div>
            `;
            cartItems.appendChild(listItem);
        }

        cartTotalPriceElement.innerText = totalPrice.toFixed(2); // Update total price
    }
}

// Remove an item from the cart
function removeFromCart(itemId) {
    delete cart[itemId]; // Remove item from cart
    updateModal(); // Update modal view
    updateCartCounter(); // Update cart counter
}

// Calculate total items and update the cart counter
function updateCartCounter() {
    const totalItems = Object.values(cart).reduce((sum, item) => sum + item.quantity, 0);
    const cartCounter = document.getElementById('cart-counter');

    if (totalItems > 0) {
        cartCounter.style.display = 'flex'; // Show counter if items exist
        cartCounter.innerText = totalItems;
    } else {
        cartCounter.style.display = 'none'; // Hide counter if no items
    }
}

// Submit the cart for checkout
function submitCart() {
    const cartDataInput = document.getElementById('cartDataInput');
    cartDataInput.value = JSON.stringify(cart); // Serialize cart object as a JSON string
    document.getElementById('cartForm').submit(); // Submit the form to order.php
}

</script>
<!-- Card Java Ends -->


</body>

</html>
