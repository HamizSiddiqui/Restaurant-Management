<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Document</title>
    
    <style>

        .bg-color{
            background: #0f0c29;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #24243e, #302b63, #0f0c29);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #24243e, #302b63, #0f0c29); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    
        }

    </style>

</head>
<body>

<!-- Connecting Starts -->
<?php include '_dbconnect.php';?>   
<!-- Connecting Ends -->


<section class="bg-color text-center" style="min-height: 600px;">
  <div class="container">
    <div class="row text-light p-3">
      
      <div class="col"> 
        <h1 >Admin Portal</h1>
        <br>
        <div class="btn-group px-3" role="group" aria-label="Basic outlined example">
          <button type="button" class="btn btn-outline-secondary">Menu</button>
          <button type="button" class="btn btn-outline-secondary">Reservation</button>
          <button type="button" class="btn btn-outline-secondary">Customer</button>
        </div>              
      </div>

      <!-- Categories Start -->
      <div class="pt-5">
        <h4 class="text-start">Categories</h4>
          <table class="table table-dark table-striped-columns">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Category Id</th>
                  <th scope="col">Category Name</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                  <?php 
                    $sql="SELECT * FROM `categories`";
                    $result=mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_assoc($result)){
                      echo '
                      <tr>
                      <th scope="row">'.$row['Category_id'].'</th>
                      <td>'.$row['Category_name'].'</td>
                      <td><a href="edit.php?cat_id='.$row['Category_id'].'"><button type="button" class="btn btn-primary">Edit</button></a>
                      <button type="button" class="btn btn-primary">Delete</button></td>
                      </tr>';
                    }                     
                  ?>
              </tbody>
            </table>
          </table>
          <!-- Categories Ends -->
          
          <!-- Items Starts -->
          <h4 class="text-start pt-5">Items</h4>
          <table class="table table-dark table-striped-columns">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Item Id</th>
                  <th scope="col">Image URL</th>
                  <th scope="col">Name</th>
                  <th scope="col">Description</th>
                  <th scope="col">Price</th>
                  <th scope="col">Category ID</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $sql="SELECT * FROM `items`";
                  $result=mysqli_query($conn,$sql);
                  while($row=mysqli_fetch_assoc($result)){
                    echo '
                    <tr>
                      <th scope="row">'.$row['Item_id'].'</th>
                      <td>'.$row['Item_image'].'</td>
                      <td>'.$row['Item_name'].'</td>
                      <td>'.$row['Item_description'].'</td>
                      <td>'.$row['Price'].'</td>
                      <td>'.$row['cat_id'].'</td>
                      <td><a href="edit.php?item_id='.$row['Item_id'].'"><button type="button" class="btn btn-primary">Edit</button></a>
                          <button type="button" class="btn btn-primary">Delete</button></td>
                    </tr>';
                  }                     
                ?>
              </tbody>
            </table>
          </table>
          <!-- Items Ends -->
        </div>
      </div>
    </div>
</section>
    
</body>
</html>