<?php

session_start();
// echo "Done";
session_unset(); // Unset all session variables
session_destroy();
header('Location: /restaurants2/Restaurant-Management/index.php');

?>