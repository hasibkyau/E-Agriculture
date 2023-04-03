<?php
$conn = mysqli_connect('localhost', 'root', '', 'project');

// session_start();
if (!isset($_SESSION['ID'])) {
    session_start();
}


if (isset($_POST['Active'])) {
    // echo "This is Activeed that is selected";
    // header("Location: ActiveProducts.php");
    // exit();
    // echo "hello";
    $id = $_POST['Active'];
    // global $conn;
    $sql = "UPDATE users SET account_status ='active' WHERE ID=$id";
    mysqli_query($conn, $sql);
}

if (isset($_POST['Delete'])) {
    // echo "This is Deleted that is selected";
    $id = $_POST['Delete'];
    // echo $id . "This is Deleted that is selected";
    
    // global $conn;
    $sql = "DELETE FROM users WHERE ID=$id";
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
            <h1 class="mx-auto ml-3 text-success">Customers Requests</h1>

        </div>
        <a class="btn btn-danger" href="DashBoard.php">Back</a>
        <div class="row ">

            <?php
            // retrieve all products from the database
            $sql = "SELECT * FROM users WHERE AccountType != 'User' AND account_status = 'pending'";
            // $sql = "SELECT * FROM users";
            $result = mysqli_query($conn, $sql);
            // session_start();

            // check if any products were found
            if (mysqli_num_rows($result) > 0) {
                // display each product on the page
                while ($row = mysqli_fetch_assoc($result)) {

                    $src = "Resources\Images\male_profile.png";

                    echo "<div class='col-lg-3'>";
                    
                    echo "<div class='card mt-3'>";
                    // echo "<div class='text-center card-header text-white bg-success'>".$row['name']."</div>";
                    echo "<img class='card-img-top rounded-circle'  src='" . $src . "' alt='" . $row['FirstName'] . "' width='200' height='200'>";
                    echo "<div class='card-body'>";
                    // echo "<p>" . $row['description'] . "</p>";
                    echo "<h2 >" . $row['FirstName']. " " . $row['LastName'] . "</h2>";
                    echo "<p class='card-text'>" . 'Account Type: ' . $row['AccountType'] . "</p>";
                    // echo "<p class='card-text'>" . 'Email: ' . $row['EmailAddress'] . "</p>";

                    echo "<form class='row' method='POST' enctype='multipart/form-data'>";
                    echo " <button type='submit' value='" . $row['ID'] . "' name='Active' class='btn btn-success' >" ."Active". "<button/>";
                    echo " <button type='submit' value='" . $row['ID'] . "' name='Delete' class='btn btn-secondary' >" ."Delete". "<button/>";
                    echo "</form>";


                    echo "</div>";
                    echo "</div>";


                    echo "</div>";
                }
            } else {
                echo "No customer request found.";
            }

            // close the database connection
            mysqli_close($conn);
            ?>

        </div>
    </div>
</body>

</html>