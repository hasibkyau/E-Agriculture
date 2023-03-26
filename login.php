<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="CSS/login.css">

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

    $conn = mysqli_connect('localhost', 'root', '', 'project');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Prepare and bind SQL statement
        $stmt = $conn->prepare("SELECT * FROM users WHERE EmailAddress = ? AND Password = ?");
        $stmt->bind_param("ss", $emailAddress, $password);

        // Set parameters and execute statement
        $emailAddress = $_POST['emailAddress'];
        $password = $_POST['password'];

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "Login successful.";
            $sql = "SELECT * FROM users WHERE EmailAddress = '$emailAddress' AND Password = '$password'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_assoc($result);
            echo $user['ID'];

            $stmt->execute();

            session_destroy();
            session_start();
            $_SESSION['login'] = 1;
            $_SESSION['ID'] = $user["ID"];
            $_SESSION['FirstName'] = $user["FirstName"];
            $_SESSION['LastName'] = $user["LastName"];
            $_SESSION['EmailAddress'] = $user["EmailAddress"];
            $_SESSION['PhoneNumber'] = $user["PhoneNumber"];
            $_SESSION['Gender'] = $user["Gender"];
            $_SESSION['AccountType'] = $user["AccountType"];
            $_SESSION['UserAddress'] = $user["UserAddress"];


            // Redirect to home page
            header("Location: index.php");
            exit();

        } else {
            echo "Invalid email address or password.";
        }
    }

    $conn->close();
    ?>


    <div class="form">
        <h3 id="formhaed">Log in Here</h3><br><br>

        <form method="post">
            <label for="emailAddress">Enter Email Address:</label>
            <input class="inpt" type="email" id="emailAddress" name="emailAddress" required><br>


            <label for="password">Password:</label>
            <input class="inpt" type="password" id="password" name="password" required><br><br><br>

                <input class="login" type="submit" value="Login"><br>
                
            
            <a class="cancel" style="float:right" href="index.php">Cancel</a>

        </form>

        <span><a class="fp" href="">Forgotten Password?</a></span><br>

        <p>Do not have an account?<br><a class="cna" href="registration.php">Create New Account</a></p>
</body>

</html>