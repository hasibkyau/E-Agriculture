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
?>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $row['EmailAddress'];
    $firstName = $_POST['FirstName'];
    $lastName = $_POST['LastName'];
    $gender = $_POST['Gender'];
    $accountType = $_POST['AccountType'];
    $password = $_POST['Password'];
    $userAddress = $_POST['UserAddress'];

    $sql = "UPDATE users SET FirstName = '$firstName', LastName = '$lastName', 
        Gender = '$gender', AccountType = '$accountType', Password = '$password', UserAddress = '$userAddress' 
        WHERE ID='$user_id'";

    if (mysqli_query($conn, $sql)) {
        echo "Profile updated successfully.";

        header("Location: MyAccount.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
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
    <div id="title" class=" border text-center text-success mt-30">
        <h1>My Profile</h1>
        </div>

        <div class="row border  mt-5 mb-5">
            <div class="col-lg-4 border ">
                <?php
                if ($row['Gender'] == "Male") {
                    $profile = "Resources/Images/male_profile.png";
                } else {
                    $profile = "Resources/Images/female_profile.jpg";

                }
                echo "<div class='row  mt-5'>";
                echo "<img class='img-fluid rounded-circle img-thumbnail mx-auto' width='150' height='150'  src='" . $profile . "' alt='" . $row['FirstName'] . "' width='200' height='200'>";
                echo "</div>";
                echo "<div class='row'>";
                echo "<p class='mx-auto m-0' style='color:black; font-weight:bold; font-size:22px'>" . $row['FirstName'] . " " . $row['LastName'] . "</p>";
                echo "</div>";
                echo "<div class='row m-0'>";
                echo "<p class='mx-auto' style='color:black; font-weight:light; font-size:18px'>" . $row['EmailAddress'] . "</p>";
                echo "</div>";

                $accountType = $row['AccountType'];
                if ($accountType == 'User') {
                    echo "<div class='row m-0'>";
                    echo "<p class='mx-auto' style='color:black; font-weight:light; font-size:18px'>" . "User Account "  . "</p>";
                    echo "</div>";
                    echo "<div class='row mx-auto'>";
                    echo "<a class='btn btn-success m-1' href='MyOrders.php'>My Orders</a>";
                    echo "<a class='btn btn-success m-1' href='MyProducts.php'>My Cart</a>";
                    echo "</div>";
                } else {
                    echo "<div class='row m-0'>";
                    echo "<p class='mx-auto' style='color:black; font-weight:light; font-size:18px'>" . "Partner Account "  . "</p>";
                    echo "</div>";
                    echo "<div class='row'>";
                    echo "<a class='btn btn-success m-1' href='MyOrders.php'>My Orders</a>";
                    echo "<a class='btn btn-success m-1' href='MyProducts.php'>My Products</a>";
                    echo "<a class='btn btn-success m-1' href='addproduct.php'>Add Products</a>";
                    echo "</div>";
                }

                ?>
                <!-- <div class="row">
                    <a class="btn btn-success m-1" href="MyOrders.php">My Orders</a>
                    <a class="btn btn-success m-1" href="MyProducts.php">My Products</a>
                    <a class="btn btn-success m-1" href="addproduct.php">Add Products</a>
                </div> -->

            </div>


            <div class="col-lg-8 border ">
                <div class="container">
                    <div class="row">
                        <h2 class="mx-auto m-5">Edit Profile</h2>
                    </div>




                    <form class="row" method="POST" enctype="multipart/form-data">

                        <div class="col-6">
                            <div class="form-group">
                                <label class="font-weight-bold text-dark" for="product_name">First Name</label>
                                <input type="text" class="form-control" name="FirstName" value=<?php echo $row['FirstName'] ?>>
                            </div>


                            <div class="form-group">
                                <label class="font-weight-bold text-dark" for="">Delivery Address</label><br>
                                <input type="text" class="form-control" name="UserAddress" value=<?php echo $row['UserAddress'] ?>></input><br>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold text-dark" for="">New Password</label><br>
                                <input type="password" class="form-control" name="Password" value=<?php echo $row['Password'] ?>></input><br>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold text-dark" for="">Profile Photo</label><br>
                                <input class="form-control" type="file" name="ProfileImage"><br>
                            </div>
                        </div>





                        <div class="col-6">
       

                            <div class="form-group">
                                <label class="font-weight-bold text-dark" for="LastName">Last Name</label>
                                <input type="text" class="form-control" name="LastName" value=<?php echo $row['LastName'] ?>>
                            </div>

                            <label class="font-weight-bold text-dark " for="">Gender</label><br>
                            <select class="form-control options" name="Gender" value=<?php echo $row['Gender'] ?>>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select><br>

                            <label class="font-weight-bold text-dark mt-3" for="">Account Type</label><br>
                            <select class="form-control options" name="AccountType" value=<?php echo $row['AccountType'] ?>>
                                <option value="Partner">Partner</option>
                                <option value="User">User</option>
                            </select><br><br>

                            <div class="form-group">
                                <label class="font-weight-bold text-dark" for=""></label><br>
                                <button class="f btn btn-primary" type="submit" value="Submit">Save Profile</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    include("footer.php ");
    ?>
</body>

</html>