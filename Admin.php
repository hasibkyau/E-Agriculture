<?php
$conn = mysqli_connect('localhost', 'root', '', 'project');
// $conn = mysqli_connect("sql100.epizy.com", "epiz_33880372", "BwcOpZ1bRKJQ", "epiz_33880372_treetrading");

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
            <h1 class="ml-3 text-success">Admin Pannel</h1>
        </div>
        <div class="row ">

            <div class="col-3">
                <a class="d-flex btn btn-success border" href="ActiveProducts.php">Active Customers</a>
                <a class="d-flex btn btn-success border" href="MyOrders.php">Active Partners</a>
                <a class="d-flex btn btn-success border" href="MyOrders.php">Partner Requests</a>
                <a class="d-flex btn btn-success border" href="MyOrders.php">Blocked Partners</a>
                <a class="d-flex btn btn-success border" href="MyOrders.php">Blocked Customers</a>
                <a class="d-flex btn btn-success border" href="MyOrders.php">Customer Orders</a>
                <a class="d-flex btn btn-success border" href="ActiveProducts.php">Active Products</a>
                <a class="d-flex btn btn-success border" href="PendingProducts.php">Pending Products</a>
                <a class="d-flex btn btn-success border" href="addproduct.php">Messages</a>
            </div>

            <div class="col-9">
                <div class="row">



                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <a class="nav-link m-0 p-0" href="ActiveProducts.php">
                            <div class="card  mb-3">
                                <div class="text-center card-header text-white bg-success">Active Products</div>
                                <div class="card-body border">
                                    <h1 class="card-text text-center"><?php echo $totalProducts ?></h1>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <a class="nav-link m-0 p-0" href="PendingProducts.php">
                            <div class="card  mb-3">
                                <div class="text-center card-header text-white bg-success">Pending Products</div>
                                <div class="card-body border">
                                    <h1 class="card-text text-center"><?php echo $totalProducts ?></h1>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <a class="nav-link m-0 p-0" href="TotalProducts.php">
                            <div class="card  mb-3" >
                                <div class="text-center card-header text-white bg-success">Total Orders</div>
                                <div class="card-body border">
                                    <h1 class="card-text text-center"><?php echo $totalOrders ?></h1>
                                </div>
                            </div>
                        </a>
                    </div>



                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <a class="nav-link m-0 p-0" href="TotalProducts.php">
                            <div class="card  mb-3" >
                                <div class="text-center card-header text-white bg-success">Active Partners</div>
                                <div class="card-body border">
                                    <h1 class="card-text text-center"><?php echo $totalPartners ?></h1>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <a class="nav-link m-0 p-0" href="TotalProducts.php">
                            <div class="card  mb-3" >
                                <div class="text-center card-header text-white bg-success">Active Customers</div>
                                <div class="card-body border">
                                    <h1 class="card-text text-center"><?php echo $totalCustomers ?></h1>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>


            </div>
        </div>
    </div>

    <?php
    include("footer.php ");
    ?>
</body>

</html>