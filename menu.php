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
                echo '<button class="btn mt-3 btn-secondary btn-sm btn-outline-light py-2 px-4 mx-4 fw-bold" type="button">'. $row['Category_name'] .'</button>';
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
                    echo '<h1 class="text-light mb-3">'.$row['Category_name'].'</h1>';
                    $category_id=$row['Category_id'];
                    $sql2="SELECT * FROM `items` where cat_id=$category_id";
                    $result2=mysqli_query($conn,$sql2);
                    $numRows = mysqli_num_rows($result2);
                    while($row2=mysqli_fetch_assoc($result2)){
                        echo'
                        <div class="col-12 col-md-3 d-inline-block">
                            <div class="card" style="width: 18rem;">
                                <img src="'.$row2['Item_image'].'" class="card-img-top" alt="...">
                                <div class="card-body">
                                <h5 class="card-title fw-bold">'. $row2['Item_name'] .'</h5>
                                <p class="card-text ">'. substr($row2['Item_description'],0,100) .'...
                                <a href="#" class=" see-more" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="'. $row2['Item_id'] .'" data-name="'. $row2 ['Item_name'] .'"data-description="'. $row2['Item_description'] .'"><br>See More</a></p>
                                <a href="#" class="btn btn-primary">Add to cart</a>
                                </div>
                            </div>
                        </div>';
                    }
                    if($numRows == 0){
                        echo '<h1 class="text-light mb-3">No Results Found</h1>';
                    }
                }        
            ?>

                <?php include 'cardmodal.php';?>
                <script src="modal.js"></script>




</body>

</html>