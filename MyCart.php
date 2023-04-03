<?php

require_once("connect.php");
if (!isset($_SESSION['ID'])) {
    session_start();
}
?>

<?php


$conn = mysqli_connect('localhost', 'root', '', 'project');

$customer_id = $_SESSION['ID'];
$sql = "SELECT * FROM cart WHERE customer_id ='$customer_id'";
$result = mysqli_query($conn, $sql);


if (isset($_POST['Remove'])) {
    $id = $_POST['Remove'];
    echo $id . "This is deleted that is selected";
    // header("Location: PendingProducts.php");
    // exit();
    // echo "hello";

    // global $conn;
    $sql = "DELETE FROM cart WHERE id='$id'";
    mysqli_query($conn, $sql);
    header("Location: MyCart.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>

    <link rel="stylesheet" href="CSS/myAccount.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script> -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script> -->

</head>

<body>
    <?php
    include("nav.php ");
    ?>


    <div class="container">

        <div class="row my-4">
            <h1 class="mx-auto ml-3 text-success">My Cart</h1>

        </div>

        <a class="btn btn-danger" href="index.php">Back</a>

        <div class="row ">

            <?php

            // check if any products were found
            if (mysqli_num_rows($result) > 0) {
                // display each product on the page
                while ($cart = mysqli_fetch_assoc($result)) {

                    $product_id = $cart['product_id'];
                    $cart_id = $cart['id'];

                    $sql = "SELECT * FROM products WHERE id ='$product_id'";
                    $result2 = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result2);

                    $path = "uploads/products/";
                    $src = $path . $row['image'];

                    // echo "</div>";
                    echo "<div class='col-lg-3'>";

                    echo "<div class='card mt-3' data-toggle='modal' data-target='#image-modal-" . $row['id'] . "'>";
                    // echo "<div class='text-center card-header text-white bg-success'>".$row['name']."</div>";
                    echo "<img class='card-img-top'  src='" . $src . "' alt='" . $row['name'] . "' width='200' height='200'>";
                    echo "<div class='card-body'>";
                    // echo "<p>" . $row['description'] . "</p>";
                    echo "<h2 >" . $row['name'] . "</h2>";
                    echo "<p class='card-text'>" . 'Price: ' . $row['price'] . ' BDT' . "</p>";
                    echo "<form class='row' method='POST' enctype='multipart/form-data'>";
                    echo " <button type='submit' value='" . $cart_id . "' name='Remove' class='d-inline-flex btn btn-success' >" ."Remove". "</button>";
                    echo " <a class='text-center btn btn-sm m-0 px-0 mx-1 bg-primary' style='margin:2px' href='OrderNow.php?id=" . $row['id'] . "'>"; 
                    echo "<span class='btn' style='font-size:16px; color:white;'>Order Now </span>";
                    echo "</a>";
                    
                    echo "</form>";
                    echo "</div>";

                    echo "</div>";


                    // Create a Bootstrap modal for each image
                    echo "<div class='modal fade' id='image-modal-" . $row['id'] . "' tabindex='-1' role='dialog' aria-labelledby='image-modal-label-" . $row['id'] . "' aria-hidden='true'>";
                    echo "<div class='modal-dialog' role='document'>";
                    echo "<div class='modal-content'>";
                    echo "<div class='modal-header'>";
                    echo "<h5 class='modal-title' id='image-modal-label-" . $row['id'] . "'>" . $row['name'] . "</h5>";
                    echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                    echo "<span aria-hidden='true'>&times;</span>";
                    echo "</button>";
                    echo "</div>";
                    echo "<div class='modal-body'>";
                    echo "<img src='" . $src . "' alt='" . $row['image'] . "' class='img-fluid'>";
                    echo "<h2  class='fruit'>" . $row['name'] . "</h2>";
                    echo "<p>" . $row['description'] . "</p>";
                    echo "<p class='card-text'>" . 'Price: ' . $row['price'] . ' BDT' . "</p>";
                    echo "<p class='card-text'>" . 'Seller ID: ' . $row['user_id'] . "</p>";
                    echo "</div>";

                    echo "<div class='modal-footer'>";

                    echo "<form class='row' method='POST' enctype='multipart/form-data'>";
                    echo " <button type='submit' value='" . $cart_id . "' name='Remove' class='d-inline-flex btn btn-success' >" ."Remove". "</button>";
                    echo " <a class='text-center btn btn-sm m-0 px-0 mx-1 bg-primary' style='margin:2px' href='OrderNow.php?id=" . $row['id'] . "'>"; 
                    echo "<span class='btn' style='font-size:16px; color:white;'>Order Now </span>";
                    echo "</a>";
                    echo "<button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>";
                    
                    echo "</form>";

                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";

                    echo "</div>";
                   
                }
            } else {
                echo "No products found.";
            }

            // close the database connection
            mysqli_close($conn);
            ?>

        </div>
    </div>
</body>

</html>