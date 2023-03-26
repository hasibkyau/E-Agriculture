<?php
$conn = mysqli_connect('localhost', 'root', '', 'project');

// session_start();
if (!isset($_SESSION['ID'])) {
    session_start();
}


if (isset($_POST['Package'])) {
    echo "This is Approved that is selected";
    // header("Location: PendingProducts.php");
    // exit();
    // echo "hello";
    $id = $_POST['Decline'];
    // global $conn;
    $sql = "UPDATE products SET product_status='packaged' WHERE id=$id";
    mysqli_query($conn, $sql);
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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script> -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script> -->

</head>

<body>

    <div class="container">

        <div class="row my-4">
            <h1 class="mx-auto ml-3 text-success">Order List</h1>

        </div>
        <a class="btn btn-danger" href="DashBoard.php">Back</a>
        <div class="row ">

            <?php
            // retrieve all products from the database
            $sql = "SELECT * FROM orders";
            $result = mysqli_query($conn, $sql);
            // session_start();

            // check if any products were found
            if (mysqli_num_rows($result) > 0) {
                // display each product on the page
                while ($row = mysqli_fetch_assoc($result)) {

                    $order_id = $row['id'];

                    echo "<div class='card-body'>";
                    echo "<h2 >" . $row['product_name'] . "</h2>";
                    echo "<p class='card-text'>" . 'Price: ' . $row['price'] . ' BDT' . "</p>";
                    echo "<p class='card-text'>" . 'Customer ID: ' . $row['customer_id'] . "</p>";
                    echo "<form class='row' method='POST' enctype='multipart/form-data'>";
                    echo " <button type='submit' value='" . $row['id'] . "' name='Decline' class='btn btn-success' > Approve Order <button/>";
                    echo " <button type='submit' value='" . $row['id'] . "' name='Delete' class='btn btn-secondary' > Delete Order<button/>";
                    echo "</form>";

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