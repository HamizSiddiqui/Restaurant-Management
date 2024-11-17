<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Document</title>

    <style>
    .bg-color {
        background: #0f0c29;
        /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #24243e, #302b63, #0f0c29);
        /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #24243e, #302b63, #0f0c29);
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    }
    </style>

</head>

<body>

<!-- Connecting Starts -->
<?php include '_dbconnect.php';?>   
<!-- Connecting Ends -->


<!-- Update Query starts -->
<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_GET['cat_id'])) {
            $id=$_GET['cat_id'];  
            $newid=$_POST['category_id'];
            $newname=$_POST['category_name'];

            $sql="UPDATE `categories` SET `Category_id` = '$newid', `Category_name` = '$newname' WHERE `Category_id` ='$id' ";
            $result=mysqli_query($conn,$sql);
            if($result){
                header('Location: /restaurants2/Restaurant-Management/admin.php');
            }else{

            }
            
        }elseif (isset($_GET['item_id'])){
            $id=$_GET['item_id'];  
            $newid=$_POST['it_id'];
            $newimageurl=$_POST['item_image'];
            $newname=$_POST['item_name'];
            $newdesc=$_POST['item_description'];
            $newprice=$_POST['price'];
            $newcatid=$_POST['cat_id'];
            
            $sql2 = "UPDATE `items` SET `Item_id` = '$newid', `Item_image` = '$newimageurl', `Item_name` = '$newname', `Item_description` = '$newdesc', `Price` = '$newprice', `cat_id` = '$newcatid' WHERE `Item_id` = '$id'";
            $result=mysqli_query($conn,$sql2);
            if($result){
                header('Location: /restaurants2/Restaurant-Management/admin.php');
            }else{

            }
        }
    }   
?>

<!--  Update Query ends-->
    <section class="bg-color text-light text-center" style="height: 695px;">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="pt-4"> Edit Portal</h1>
                    <!-- Category edit starts -->
                    <?php if(isset($_GET['cat_id'])): ?>
                    <form action="edit.php?cat_id=<?php echo $_GET['cat_id']; ?>" method="post">
                    <table class="table table-dark table-striped-columns">
                        <table class="table">
                            <tbody>
                                <?php 
                                    $id=$_GET['cat_id'];
                                    $sql="SELECT * FROM `categories` where Category_id=$id";
                                    $result=mysqli_query($conn,$sql);
                                    while($row=mysqli_fetch_assoc($result)){
                                        echo'
                                        <tr>
                                            <th>Category ID</th>
                                            <td><textarea class="form-control" id="floatingTextarea2" name="category_id"
                                                    style="height: 60px">'.$row['Category_id'].'</textarea></td>
                                        </tr>
                                        <tr>
                                            <th>Category Name</th>
                                            <td><textarea class="form-control" id="floatingTextarea2" name="category_name"
                                                    style="height: 60px">'.$row['Category_name'].'</textarea></td>
                                        </tr>
                                        ';
                                    }
                                ?>
                            </tbody>
                            <br>
                        </table>
                        <button type="submit" class="btn btn-secondary text-light btn-outline-success px-4">Save
                            Changes</button>
                        <a href="admin.php"><button type="button"
                            class="btn btn-secondary text-light btn-outline-success px-5">Cancel</button></a>
                    </table>
                    </form>
                    <!-- Category edit ends -->
                    
                    
                    <!-- items edit starts -->
                    <?php elseif(isset($_GET['item_id'])): ?>
                    <form action="edit.php?item_id=<?php echo $_GET['item_id']; ?>" method="post">
                    <table class="table table-dark table-striped-columns">
                        <table class="table">
                            <tbody>
                                <?php 
                                    $id=$_GET['item_id'];
                                    $sql="SELECT * FROM `items` where Item_id=$id";
                                    $result=mysqli_query($conn,$sql);
                                    while($row=mysqli_fetch_assoc($result)){
                                        echo'
                                        <tr>
                                            <th>ID</th>
                                            <td><textarea class="form-control" id="floatingTextarea2" name="it_id" style="height: 60px">'.$row['Item_id'].'</textarea></td>
                                        </tr>
                                        <tr>
                                            <th>Image URL</th>
                                            <td><textarea class="form-control" id="floatingTextarea2" name="item_image" style="height: 60px">'.$row['Item_image'].'</textarea></td>
                                        </tr>
                                        <tr>
                                            <th>Name</th>
                                            <td><textarea class="form-control" id="floatingTextarea2" name="item_name" style="height: 60px">'.$row['Item_name'].'</textarea></td>
                                        </tr>
                                        <tr>
                                            <th>Description</th>
                                            <td><textarea class="form-control" id="floatingTextarea2" name="item_description" style="height: 60px">'.$row['Item_description'].'</textarea></td>
                                        </tr>
                                        <tr>
                                            <th>Price</th>
                                            <td><textarea class="form-control" id="floatingTextarea2" name="price" style="height: 60px">'.$row['Price'].'</textarea></td>
                                        </tr>
                                        <tr>
                                            <th>Category id</th>
                                            <td><textarea class="form-control" id="floatingTextarea2" name="cat_id" style="height: 60px">'.$row['cat_id'].'</textarea></td>
                                        </tr>
                                        ';
                                    }
                                ?>
                            </tbody>
                            <br>
                        </table>
                        <button type="submit" class="btn btn-secondary text-light btn-outline-success px-4">Save
                            Changes</button>
                        <a href="admin.php"><button type="button"
                            class="btn btn-secondary text-light btn-outline-success px-5">Cancel</button></a>
                    </table>
                    </form>
                    <!-- items edit ends --> 
                    <?php endif; ?> 
                </div>
            </div>
        </div>
    </section>
</body>

</html>