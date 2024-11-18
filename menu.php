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
                                        <a href="#" class="see-more" id="see-more" data-bs-toggle="modal" data-bs-target="#itemModal" data-id="'. $row2['Item_id'] .'" data-name="'. $row2 ['Item_name'] .'" data-description="'. $row2['Item_description'] .'"><br>See More</a></p>
                                        <div class="counter-controls">
                                            <button type="button" class="btn" onclick="updateQuantity(\''.$row2['Item_id'].'\', -1, \''.$row2['Item_name'].'\')">-</button>
                                            <span id="quantity-'.$row2['Item_id'].'" class="counter">0</span>
                                            <button type="button" class="btn" onclick="updateQuantity(\''.$row2['Item_id'].'\', 1, \''.$row2['Item_name'].'\')">+</button>
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

    <!-- See More Modal Starts -->
    <div class="modal fade" id="itemModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Item Name</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="modalDescription">Item Description</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- See More Modal Ends -->


    <!-- Basket Modal Starts-->
    <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartModalLabel">Shopping Cart</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul id="cartItems" class="cart-items">
                        <!-- Cart items will be dynamically added here -->
                    </ul>
                    <p id="cartEmptyMessage">Your cart is empty. Add items to see them here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Go to Checkout</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Basket Modal Ends-->


    <script>
    let cart = {}; // Object to store cart items and quantities

// Play a notification sound
const notificationSound = new Audio('notification.mp3'); // Ensure this file exists in your project

// Update item quantity
function updateQuantity(itemId, change, itemName) {
    notificationSound.play();

    // Initialize cart item if it doesn't exist
    if (!cart[itemId]) {
        cart[itemId] = { quantity: 0, name: itemName };
    }

    // Update quantity
    cart[itemId].quantity += change;

    // Remove item if the quantity is zero or less
    if (cart[itemId].quantity <= 0) {
        delete cart[itemId];
    }

    // Update the quantity display in the card
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
    cartItems.innerHTML = ''; // Clear current cart content

    if (Object.keys(cart).length === 0) {
        cartEmptyMessage.style.display = 'block';
    } else {
        cartEmptyMessage.style.display = 'none';

        // Populate cart modal with items
        for (const itemId in cart) {
            const listItem = document.createElement('li');
            listItem.className = 'list-group-item d-flex justify-content-between align-items-center';
            listItem.innerHTML = `
                ${cart[itemId].name} (x${cart[itemId].quantity})
                <span class="remove-btn" onclick="removeFromCart('${itemId}')">Remove</span>
            `;
            cartItems.appendChild(listItem);
        }
    }
}

// Remove an item from the cart
function removeFromCart(itemId) {
    delete cart[itemId]; // Remove from cart
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
</script>

</body>

</html>
