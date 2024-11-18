
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
            
    .icon {
        color: white; /* Change icon color */
        margin-right: 8px; /* Add space between icon and text */
        font-size: 1.2rem; /* Adjust icon size */
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
            </ul>
                <div class="cart-container">
                    <i class="fa-solid fa-cart-shopping icon">
                        <span id="cart-counter">0</span>
                    </i>
                </div>
        </div>
    </div>
</nav>
';


?>