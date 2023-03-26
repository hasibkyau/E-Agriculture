<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="CSS/registration.css">

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

         // Prepare and bind SQL statement to check if email exists
         $validation = $conn->prepare("SELECT * FROM users WHERE EmailAddress = ?");
         $validation->bind_param("s", $emailAddress);
 
         // Set parameters and execute statement
         $emailAddress = $_POST['emailAddress'];
 
         $validation->execute();
         $result = $validation->get_result();

         if ($result->num_rows > 0) {
            echo "An account with this email already exists.";
        } else {

        // Prepare and bind SQL statement
        $stmt = $conn->prepare("INSERT INTO users (Date, FirstName, LastName, EmailAddress, PhoneNumber, Gender, AccountType, Password, UserAddress) VALUES (NOW(), ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $firstName, $lastName, $emailAddress, $phoneNumber, $gender, $accountType, $password, $userAddress);

        // Set parameters and execute statement
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $emailAddress = $_POST['emailAddress'];
        $phoneNumber = $_POST['phoneNumber'];
        $gender = $_POST['gender'];
        $accountType = $_POST['accountType'];
        $password = $_POST['password'];
        $userAddress = $_POST['userAddress'];

        $stmt->execute();

        echo "User registration successful.";
        // Redirect to home page
        header("Location: login.php");
        exit();
        }
    }

    $conn->close();

    ?>

    <form id="Registrationform" action="" method="POST">
        <h3 class="head">Registration For Account</h3><br>


        <label for="firstName">First Name:</label>
        <input class="styl" type="text" id="firstName" name="firstName" required><br>

        <label for="lastName">Last Name:</label>
        <input class="styl" type="text" id="lastName" name="lastName" required><br>


        <label for="emailAddress">Email Address:</label>
        <input class="styl" type="email" id="emailAddress" name="emailAddress" required><br>

        <label for="phoneNumber">Phone Number:</label>
        <input class="styl" type="tel" id="phoneNumber" name="phoneNumber" required><br>


        <label for="gender">Gender:</label><br>
        <select id="gender" name="gender" required>
            <option value="">Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select><br>

        <label for="accountType">Account Type:</label><br>
        <select id="accountType" name="accountType" required>
            <option value="">Select Account Type</option>
            <option value="Partner">Partner</option>
            <option value="User">User</option>
        </select><br>

        <label for="password">Password:</label>
        <input class="styl" type="password" id="password" name="password" required><br>

        <label for="userAddress">Address:</label>
        <input class="styl" type="text" id="userAddress" name="userAddress" required><br>

        <p id="para">By proceeding with the registration I confirm that I have read and accept the Terms and
            Conditions.<br><br>
            <input class="sub" type="submit" value="Submit"><br>
            <a class="Cancel" href="index.php">Cancel</a><br>
        </p>
    </form>
</body>

</html>