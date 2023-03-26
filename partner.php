<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About Us</title>

    <!-- External CSS Files -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">

</head>

<body>
    <?php
    include("nav.php ");
    ?>

    <section id="ourMission">
        <div class="container">

            <div class="leaderShip">


                <div class="row">
                    <?php
                    // retrieve all products from the database
                    $sql = "SELECT * FROM users WHERE AccountType != 'User' AND account_status = 'active'";
                    // $sql = "SELECT * FROM users";
                    $result = mysqli_query($conn, $sql);
                    // session_start();

                    // check if any products were found
                    if (mysqli_num_rows($result) > 0) {
                        // display each product on the page
                        while ($row = mysqli_fetch_assoc($result)) {

                            $src = "Resources\Images\male_profile.png";
                            $src2 =  "Resources\Images\garden.jpg";

                            echo "<div class='row border border-dark my-2'>";
                            echo "<div class='col-6 border border-dark'>";

                            echo "<div class='text-center'>";
                            echo "<h2 >" ."Partner Information". "</h2>";
                            // echo "<div class='text-center card-header text-white bg-success'>".$row['name']."</div>";
                            echo "<img class='img-fluid user manik'  src='" . $src . "' alt='" . $row['FirstName'] . "' width='200' height='200'>";
                            echo "<div class='card-body'>";
                            // echo "<p>" . $row['description'] . "</p>";
                            echo "<h2 >" . $row['FirstName'] . " " . $row['LastName'] . "</h2>";
                            echo "<p class='card-text'>" . 'Phone: ' . $row['PhoneNumber'] . "</p>";
                            // echo "<p class='card-text'>" . 'Email: ' . $row['EmailAddress'] . "</p>";

                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                         


                            
                            echo "<div class='col-6'>";
                          

                            echo "<div class='text-center'>";
                            echo "<h2 >" ."Garden Information". "</h2>";
                            echo "<p class='card-text'>" . 'Location: ' . $row['UserAddress'] . "</p>";
                            // echo "<div class='text-center card-header text-white bg-success'>".$row['name']."</div>";
                            echo "<img class='img-fluid user'  src='" . $src2 . "' alt='" . $row['FirstName'] . ">";
                            echo "<div class='card-body'>";
                            // echo "<p>" . $row['description'] . "</p>";

                            // echo "<p class='card-text'>" . 'Email: ' . $row['EmailAddress'] . "</p>";

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


        </div>
    </section>


    <!-- External JS Files -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="js/custom.js"></script>

    <?php
    include("footer.php ");
    ?>
</body>

</html>