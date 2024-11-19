
<style>
    .wrapper{ 
        background-color: rgba(0, 0, 0, 0.534);
    }
    .sec-1{
        /* background-image: url(https://as2.ftcdn.net/v2/jpg/02/92/20/37/1000_F_292203735_CSsyqyS6A4Z9Czd4Msf7qZEhoxjpzZl1.jpg); */
        background-image: url(https://images.pexels.com/photos/326281/pexels-photo-326281.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1);
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
            
    .cart-container {
      position: relative;
      display: inline-block;
    }

    .icon {
      font-size: 1.8rem;
      color: white;
      position: relative;
    }

    .counter {
      position: absolute;
      top: -10px;
      right: -10px;
      background-color: #dc3545;
      color: white;
      font-size: 0.8rem;
      font-weight: bold;
      width: 20px;
      height: 20px;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
    }
</style>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        

<?php

echo '
<nav class="navbar navbar-expand-lg navbar-dark fw-bolder justify-content-center">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"></a>
        
        <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">
                <li class="nav-item ">
                    <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
                </li>
                <li class="nav-item px-3"></li>
                    <a class="nav-link active" aria-current="page" href="./menu.php">Menu</a>
                </li>
                <li class="nav-item px-3"></li>
                    <a class="nav-link active" aria-current="page" href="./reservation.php">Reservation</a>
                </li>
                <li class="nav-item px-3"></li>
                    <a class="nav-link active" aria-current="page" href="./aboutus.html">About Us</a>
                </li>
                </li>
                <li class="nav-item px-3"></li>
                    <a class="nav-link active" aria-current="page" href="./contactus.html">Contact Us</a>
                </li>
                <li class="nav-item px-3"></li>
                    <a class="nav-link active" aria-current="page" href="./order_status.php">Order Status</a>
                </li>
            </ul>
            <!-- Cart Icon with Counter -->
            <div class="cart-container">
                <button type="button" class="btn btn-primary  text-light fw-bolder" data-bs-toggle="modal" data-bs-target="#cartModal">
                <i class="fa-solid fa-cart-shopping" style="font-size: 20px"></i> <span id="cart-counter" class="badge bg-danger">0</span>
                </button>
            </div>
            
        </div>
    </div>
</nav>
';

?>