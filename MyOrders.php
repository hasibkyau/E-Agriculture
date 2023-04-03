<?php
$conn = mysqli_connect('localhost', 'root', '', 'project');

// session_start();
if (!isset($_SESSION['ID'])) {
    session_start();
}

$user_id = $_SESSION['ID'];
$sql = "SELECT * FROM users WHERE ID = '$user_id'";
$result = mysqli_query($conn, $sql);


// check if any products were found
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
}

if (isset($_POST['Delete'])) {
    // echo "This is Deleted that is selected";
    $id = $_POST['Delete'];
    echo $id . "This is Deleted that is selected";

    // global $conn;
    $sql = "DELETE FROM orders WHERE id=$id";
    mysqli_query($conn, $sql);
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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</head>

<body>
<?php
    include("nav.php ");
    ?>

    <div class="container">
    <div class='row m-5'>
            <h2 class="mx-auto">My Orders</h2>
</div>

        <div class='row'>
            <?php
            $sql = "SELECT * FROM orders WHERE customer_id = '$user_id'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $product_id = $row['product_id'];

                    $sql2 = "SELECT * FROM products WHERE id ='$product_id'";
                    $result2 = mysqli_query($conn, $sql2);
                    $product = mysqli_fetch_assoc($result2);

                    $path = "uploads/products/";
                    $imgName = $product['image'];
                    $src = $path . $imgName;

                    $price = 'Price: ';
                    $val = $product['price'];
                    $tk = ' /-';
                    $cost = $price . $val . $tk;

                    $see_more = 'See More';

                    $order_id = $row['id'];

                    // echo "<div class='card-body'>";
                    // echo "<h2 >" . $row['product_name'] . "</h2>";
                    // echo "<p class='card-text'>" . 'Price: ' . $row['price'] . ' BDT' . "</p>";
                    // echo "<p class='card-text'>" . 'Customer ID: ' . $row['customer_id'] . "</p>";
                    // echo "<form class='row' method='POST' enctype='multipart/form-data'>";
                    // echo " <button type='submit' value='" . $row['id'] . "' name='Decline' class='btn btn-success' > Approve Order </button/>";
                    // echo " <a type='submit' href='DashBoard.php' class='btn btn-secondary' >" . "Cancel" . "</a>";
                    // echo "</form>";

                    // echo "</div>";





                    echo "<div class='col-lg-3'>";

                    echo "<div class='card mt-2'>";
                    echo "<img class='card-img-top'  src='" . $src . "' alt='" . $product['name'] . "' width='200' height='200'>";
                    echo "<div class='card-body'>";

                    echo "<div class='card-title'>";
                    echo "<h2  class='fruit'>" . $product['name'] . "</h2>";
                    echo "</div>";

                    // echo "<p class='card-text m-0'>" . "Product Price: " . $product['price'] . " BDT" . "</p>";
                    echo "<p class='card-text m-0'>" . "Quantity: " . $row['quantity'] .  "</p>";
                    echo "<p class='card-text m-0'>" . "Total Price: " . $row['total_price'] .  " BDT". "</p>";
                    // echo "<p class='card-text m-0'>" . $row['payment_option'] .  "</p>";
                    // echo "<p class='card-text m-0'>" . "Address: " . $row['delivery_address'] .  "</p>";
                    echo "<form class='row' method='POST' enctype='multipart/form-data'>";
                    echo " <button type='submit' value='" . $row['id'] . "' name='Delete' class='btn btn-success d-flex' > Cancel Order </button/>";
                    echo "</form>";

                    echo "</div>";
                    echo "</div>";
                    // Create a Bootstrap modal for each image
                    echo "</div>";

                }
            }
            ?>
        </div>

    </div>

    <?php
    include("footer.php ");
    ?>
</body>

</html>