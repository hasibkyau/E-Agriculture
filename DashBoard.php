<?php
$conn = mysqli_connect('localhost', 'root', '', 'project');

// session_start();
if (!isset($_SESSION['ID'])) {
    session_start();
}

$user_id = $_SESSION['ID'];
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

$activeCustomers = 0;
$activePartners = 0;

while ($row = mysqli_fetch_assoc($result)) {
    if ($row['AccountType'] == 'Users') {
        $activeCustomers = $activeCustomers + 1;
    } else {
        $activePartners = $activePartners + 1;
    }
}

$activeProducts = mysqli_query($conn, "SELECT COUNT(*) FROM products WHERE product_status='approved'")->fetch_assoc();
$activeProducts = $activeProducts['COUNT(*)'];

$pendingProducts = mysqli_query($conn, "SELECT COUNT(*) FROM products WHERE product_status='pending'")->fetch_assoc();
$pendingProducts = $pendingProducts['COUNT(*)'];

$totalOrders = mysqli_query($conn, "SELECT COUNT(*) FROM orders")->fetch_assoc();
$totalOrders = $totalOrders['COUNT(*)'];

$totalUsers = mysqli_query($conn, "SELECT COUNT(*) FROM users")->fetch_assoc();
$totalUsers = $totalUsers['COUNT(*)'];

$activeCustomers = mysqli_query($conn, "SELECT COUNT(*) FROM users WHERE AccountType = 'User' AND account_status = 'active'")->fetch_assoc();
$activeCustomers = $activeCustomers['COUNT(*)'];

$blockedCustomer = mysqli_query($conn, "SELECT COUNT(*) FROM users WHERE AccountType = 'User' AND account_status = 'blocked'")->fetch_assoc();
$blockedCustomer = $blockedCustomer['COUNT(*)'];

$CustomerRequest = mysqli_query($conn, "SELECT COUNT(*) FROM users WHERE AccountType = 'User' AND account_status = 'pending'")->fetch_assoc();
$CustomerRequest = $CustomerRequest['COUNT(*)'];


$activePartners = mysqli_query($conn, "SELECT COUNT(*) FROM users WHERE AccountType != 'User' AND account_status = 'active'")->fetch_assoc();
$activePartners = $activePartners['COUNT(*)'];

$blockedPartners = mysqli_query($conn, "SELECT COUNT(*) FROM users WHERE AccountType != 'User' AND account_status = 'blocked'")->fetch_assoc();
$blockedPartners = $blockedPartners['COUNT(*)'];

$PartnerRequest = mysqli_query($conn, "SELECT COUNT(*) FROM users WHERE AccountType != 'User' AND account_status = 'pending'")->fetch_assoc();
$PartnerRequest = $PartnerRequest['COUNT(*)'];


$messages = mysqli_query($conn, "SELECT COUNT(*) FROM faq")->fetch_assoc();
$messages = $messages['COUNT(*)'];


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

                <a class="d-flex btn btn-success border" href="Messages.php">Messages</a>
                <a class="d-flex btn btn-success border" href="ActiveProducts.php">Active Products</a>
                <a class="d-flex btn btn-success border" href="PendingProducts.php">Pending Products</a>
                <a class="d-flex btn btn-success border" href="ActiveCustomer.php">Active Customers</a>
                <a class="d-flex btn btn-success border" href="ActivePartner.php">Active Partners</a>
                <a class="d-flex btn btn-success border" href="PartnerRequest.php">Partner Requests</a>
                <a class="d-flex btn btn-success border" href="BlockedPartner.php">Blocked Partners</a>
                <a class="d-flex btn btn-success border" href="BlockedCustomer.php">Blocked Customers</a>
                <a class="d-flex btn btn-success border" href="OrderList.php">Customer Orders</a>
            </div>

            <div class="col-9">
                <div class="row">


                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <a class="nav-link m-0 p-0" href="Messages.php">
                            <div class="card  mb-3">
                                <div class="text-center card-header text-white bg-success">FAQ</div>
                                <div class="card-body border">
                                    <h1 class="card-text text-center"><?php echo $messages ?></h1>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <a class="nav-link m-0 p-0" href="ActiveProducts.php">
                            <div class="card  mb-3">
                                <div class="text-center card-header text-white bg-success">Active Products</div>
                                <div class="card-body border">
                                    <h1 class="card-text text-center"><?php echo $activeProducts ?></h1>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <a class="nav-link m-0 p-0" href="PendingProducts.php">
                            <div class="card  mb-3">
                                <div class="text-center card-header text-white bg-success">Pending Products</div>
                                <div class="card-body border">
                                    <h1 class="card-text text-center"><?php echo $pendingProducts ?></h1>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <a class="nav-link m-0 p-0" href="OrderList.php">
                            <div class="card  mb-3">
                                <div class="text-center card-header text-white bg-success">Total Orders</div>
                                <div class="card-body border">
                                    <h1 class="card-text text-center"><?php echo $totalOrders ?></h1>
                                </div>
                            </div>
                        </a>
                    </div>



                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <a class="nav-link m-0 p-0" href="ActivePartner.php">
                            <div class="card  mb-3">
                                <div class="text-center card-header text-white bg-success">Active Partners</div>
                                <div class="card-body border">
                                    <h1 class="card-text text-center"><?php echo $activePartners ?></h1>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <a class="nav-link m-0 p-0" href="BlockedPartner.php">
                            <div class="card  mb-3">
                                <div class="text-center card-header text-white bg-success">Blocked Partners</div>
                                <div class="card-body border">
                                    <h1 class="card-text text-center"><?php echo $blockedPartners ?></h1>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <a class="nav-link m-0 p-0" href="PartnerRequest.php">
                            <div class="card  mb-3">
                                <div class="text-center card-header text-white bg-success">Partners Requests</div>
                                <div class="card-body border">
                                    <h1 class="card-text text-center"><?php echo $PartnerRequest ?></h1>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <a class="nav-link m-0 p-0" href="ActiveCustomer.php">
                            <div class="card  mb-3">
                                <div class="text-center card-header text-white bg-success">Active Customers</div>
                                <div class="card-body border">
                                    <h1 class="card-text text-center"><?php echo $activeCustomers ?></h1>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <a class="nav-link m-0 p-0" href="BlockedCustomer.php">
                            <div class="card  mb-3">
                                <div class="text-center card-header text-white bg-success">Blocked Customers</div>
                                <div class="card-body border">
                                    <h1 class="card-text text-center"><?php echo $blockedCustomer ?></h1>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <a class="nav-link m-0 p-0" href="CustomerRequest.php">
                            <div class="card  mb-3">
                                <div class="text-center card-header text-white bg-success">Customer Requests</div>
                                <div class="card-body border">
                                    <h1 class="card-text text-center"><?php echo $CustomerRequest ?></h1>
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