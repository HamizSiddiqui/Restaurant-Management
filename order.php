<?php
include '_dbconnect.php'; // Ensure this connects to your database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Decode the JSON string into an associative array
    $cartData = json_decode($_POST['cartData'], true);

    if ($cartData && is_array($cartData)) {

        // // get user_id
        // $sql2 = "INSERT INTO orders (order_id,user_id,order_date,total_amount,order_type) VALUES ('', '$userid', '','','')";
        // $result2 = mysqli_query($conn, $sql2);

        // // Add order_id
        // $sql2 = "INSERT INTO orders (order_id,user_id,order_date,total_amount,order_type) VALUES ('', '$userid', '','','')";
        // $result2 = mysqli_query($conn, $sql2);

        foreach ($cartData as $itemId => $item) {
            $itemName = mysqli_real_escape_string($conn, $item['name']);
            $itemQuantity = (int)$item['quantity'];

            // Insert into database
            $sql = "INSERT INTO quantities (item_name, quantity) VALUES ('$itemName','$itemQuantity')";
            $result = mysqli_query($conn, $sql);

            if (!$result) {
                die("Database Insertion Failed: " . mysqli_error($conn));
            }
        }

        // Redirect to a success or order confirmation page
        header('Location: order_success.php');
        exit();
    } else {
        echo "Cart is empty or data is invalid!";
    }
} else {
    echo "Invalid request method!";
}
?>
