<?php
require_once("connect.php");
if (!isset($_SESSION['ID'])) {
    session_start();

    $productId = $_GET['id'];
    $userId = $_SESSION['ID'];



}

$productId = $_GET['id'];
$userId = $_SESSION['ID'];

if(!isset($_SESSION['ID'])){
    header("Location: login.php");
    exit();
}




$sql = "SELECT * FROM users WHERE ID = '$userId'";
$result = mysqli_query($conn, $sql);
// check if any products were found
if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
}

$sql = "SELECT * FROM products WHERE ID = '$productId'";
$result = mysqli_query($conn, $sql);
// check if any products were found
if (mysqli_num_rows($result) > 0) {
    $product = mysqli_fetch_assoc($result);
}


// Check if form is submitted
if (isset($_POST['submit'])) {

    // Sanitize user input
    $customer_id = $userId;
    $product_id = $productId;
    $product_name = $product['name'];
    $price = $product['price'];
    $quantity = filter_var($_POST['quantity'], FILTER_SANITIZE_NUMBER_INT);
    $total_price = filter_var($_POST['total_price'], FILTER_SANITIZE_NUMBER_INT);
    $delivery_address = filter_var($_POST['delivery_address'], FILTER_SANITIZE_STRING);
    $email_address = filter_var($_POST['email_address'], FILTER_SANITIZE_STRING);
    $phone_number = filter_var($_POST['phone_number'], FILTER_SANITIZE_STRING);
    $payment_option = filter_var($_POST['payment_option'], FILTER_SANITIZE_STRING);

    // Validate form data
    if (empty($quantity) || empty($delivery_address) || empty($payment_option)) {
        $error_message = 'All fields are required.';
        echo $error_message;
    } 
    else {

        // Prepare SQL statement to insert order into database
        $conn = mysqli_connect('localhost', 'root', '', 'project');
        $sql = "INSERT INTO orders (customer_id, product_id, product_name, price, quantity, total_price, delivery_address, email_address, phone_number, payment_option) VALUES ('$customer_id', '$product_id', '$product_name', '$price', '$quantity', '$total_price', '$delivery_address', '$email_address', '$phone_number', '$payment_option')";
        if (mysqli_query($conn, $sql)) {
            echo "Product uploaded successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        // Execute SQL statement
    }
}

// Close database connection
$conn->close();

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
        <div class="row border mt-5 mb-5">

            <div class="col-lg-6 border p-3">
                <h2 class='mx=auto'>Product Information</h2>
                <?php
                $product_img = 'Uploads/Products/' . $product['image'];

                echo "<div class='row  mt-5'>";
                echo "<img class='img-fluid  mx-auto'   src='" . $product_img . "' alt='" . $user['FirstName'] . "' width='200' height='200'>";
                echo "</div>";
                echo "<div class='row'>";
                echo "<p class='mx-auto m-0' style='color:black; font-weight:bold; font-size:22px'>" . $product['name'] .  "</p>";
                echo "</div>";
                echo "<div class='row m-0'>";
                echo "<p class='mx-2' style='color:black; font-weight:light; font-size:18px'>" . 'Description: ' . $product['description'] . "</p>";
                echo "</div>";

                echo "<div class='row  mx-2'>";
                echo "<h2 style='font-weight:bold; font-size:16px'>" . 'Price: ' . $product['price'] . " /-" . "</h2>";
                echo "</div>";
                echo "<div class='row  mx-2'>";

                if ($product['quantity'] > 0) {
                    echo "<h2 style='font-weight:bold; font-size:16px'>" . 'InStock: ' . $product['quantity'] . "</h2>";
                } else {
                    echo "<h2 style='font-weight:bold; font-size:16px; color:red'>" . 'Out of Stock: ' . $product['quantity'] . "</h2>";
                }


                echo "</div>";
                ?>
            </div>
            

            <div class="col-lg-6 border ">
                

                <!-- HTML code for order form -->
                <form class="m-3" method="post">
                    <h2 class='mx=auto'>Customer Information</h2>

                    <p>Customer Name:
                        <?php echo $user['FirstName'] . " " . $user['LastName']; ?>
                    </p>

                    <div>
                        <label>Email Address:</label>
                        <input class="form-control" name="email_address" type="email" value="<?php echo $user['EmailAddress']; ?>"></input>
                    </div>

                    <div>
                        <label>Phone Number:</label>
                        <input class="form-control" name="phone_number" type="tel" value="<?php echo $user['PhoneNumber']; ?>"></input>
                    </div>

                    <div>
                        <label>Quantity:</label>
                        <input class="form-control" type="number" name="quantity" value="1" min="1" max="100">
                    </div>
                    <div>
                        <label>Total Price:</label>
                        <input class="form-control"  type="number" name="total_price" value="<?php echo $product['price']; ?>"
                            min="1" max="100000">
                    </div>
                    <div>
                        <label>Delivery Address:</label>
                        <textarea class="form-control" name="delivery_address" value=""><?php echo $user['UserAddress']; ?></textarea>
                    </div>
                    <div>
                        <label>Payment Option:</label>
                        <select class="form-control" name="payment_option">
                            <option value="">Select Payment Option</option>
                            <option value="Cash on Delivery">Cash on Delivery</option>
                            <option value="Online Payment">Online Payment</option>
                        </select><br>
                    </div>
                    <div>
                        <input class="btn btn-success" type="submit" name="submit" value="Place Order">
                    </div>
                </form>
                <script>
                    // Update total price when quantity changes
                    document.getElementsByName('quantity')[0].addEventListener('input', function () {
                        var price = <?php echo $product['price']; ?>;
                        var quantity = this.value;
                        var totalPrice = price * quantity;
                        document.getElementsByName('total_price')[0].value = totalPrice.toFixed(2);
                    });
                </script>

            </div>
        </div>
    </div>

</body>

</html>