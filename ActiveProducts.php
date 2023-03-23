<?php
$conn = mysqli_connect('localhost', 'root', '', 'project');

// session_start();
if (!isset($_SESSION['ID'])) {
    session_start();
}

$user_id = $_SESSION['ID'];
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

$totalCustomers = 0;
$totalPartners = 0;

while ($row = mysqli_fetch_assoc($result)) {
    if ($row['AccountType'] == 'Users') {
        $totalCustomers = $totalCustomers + 1;
    } else {
        $totalPartners = $totalPartners + 1;
    }
}

$totalProducts = mysqli_query($conn, "SELECT COUNT(*) FROM products")->fetch_assoc();
$totalProducts = $totalProducts['COUNT(*)'];

$totalOrders = mysqli_query($conn, "SELECT COUNT(*) FROM orders")->fetch_assoc();
$totalOrders = $totalOrders['COUNT(*)'];

$totalUsers = mysqli_query($conn, "SELECT COUNT(*) FROM users")->fetch_assoc();
$totalUsers = $totalUsers['COUNT(*)'];

$totalCustomers = mysqli_query($conn, "SELECT COUNT(*) FROM users WHERE AccountType = 'User'")->fetch_assoc();
$totalCustomers = $totalCustomers['COUNT(*)'];

$totalPartners = mysqli_query($conn, "SELECT COUNT(*) FROM users WHERE AccountType != 'User'")->fetch_assoc();
$totalPartners = $totalPartners['COUNT(*)'];

// check if any products were found
// if (mysqli_num_rows($result) > 0) {
//     $row = mysqli_fetch_assoc($result);
// }
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
</head>

<body>
    <?php
    include("nav.php ");
    ?>
    
    <div class="container">

        <div class="row my-4">
            <h1 class="ml-3 text-info">Total Products</h1>

        </div>
        <a class="btn btn-danger" href="DashBoard.php">Back</a>
        <div class="row ">

        <?php
                // retrieve all products from the database
                $sql = "SELECT * FROM products";
                $result = mysqli_query($conn, $sql);
                // session_start();

                // check if any products were found
                if (mysqli_num_rows($result) > 0) {
                    // display each product on the page
                    while ($row = mysqli_fetch_assoc($result)) {
                        $path = "uploads/products/";
                        $imgName = $row['image'];
                        $src = $path . $imgName;

                        $price = 'Price: ';
                        $val = $row['price'];
                        $tk = ' /-';
                        $cost = $price . $val . $tk;

                        $see_more = 'See More';

                        echo "<div class='col-lg-3'>";

                        echo "<div class='card mt-3' data-toggle='modal' data-target='#image-modal-" . $row['id'] . "'>";
                        echo "<img class='card-img-top'  src='" . $src . "' alt='" . $row['name'] . "' width='200' height='200'>";
                        echo "<div class='card-body'>";
                        echo "<div class='card-title'>";
                        echo "<h2  class='fruit'>" . $row['name'] . "</h2>";
                        echo "</div>";
                        // echo "<p>" . $row['description'] . "</p>";
                        echo "<p class='card-text'>" . $cost . "</p>";
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
                        echo "<p class='card-text'>" . $cost . "</p>";
                        echo "</div>";

                        echo "<div class='modal-footer'>";

                        echo " <a class='btn btn-primary' href='OrderNow.php?id=".$row['id']."'> Order Now <a/>";
                        echo " <a class='btn btn-secondary' href='MyCart.php?id=".$row['id']."'> Add to Cart <a/>";
                        echo "<button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>";

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

    <?php
    include("footer.php ");
    ?>
</body>

</html>