<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Registration Form</title>

    <style>
        #Registrationform {
            width: 500px;
            height: 850px;

            box-shadow: rgba(9, 30, 66, 0.25) 0px 8px 12px -2px,
                rgba(184, 189, 198, 0.25) 0px 5px 20px 20px;
            margin: 20px 400px;
            border-radius: 15px;
            font-size: 15px;
            color: white;

        }

        li {
            list-style: none;
            float: left;
            margin-left: 10px;
            font-size: 20px;
            color: black;

        }

        .head {
            width: 380px;
            height: 40px;
            padding: 1px;
            font-size: 32px;
            color: orange;
            text-align: center;
            border: 2px solid orange;
            margin-left: 40px;
            margin-top: 40px;
            border-radius: 10px;
            font-family: 'Times New Roman';
            position: relative;
            top: 30px;
        }

        .styl {
            width: 380px;
            height: 40px;
            border-radius: 3px;
            font-size: 20px;
            border: 1px solid orange;
            margin-top: 7px;
            margin-left: 40px;
            border-bottom: 2px solid orange;
            background: transparent;

        }

        .styl::placeholder {
            font-style: italic;
            font-size: 15px;
        }

        label {
            font-weight: bold;
            margin-left: 40px;
            font-size: 23px;
            color: green;
        }

        #para {
            margin-left: 40px;
            width: 380px;
            text-align: center;
            color: rgb(120, 157, 179);
            font-size: 20px;
            margin-top: 5px;

        }

        .sub {
            width: 210px;
            height: 35px;
            border-radius: 18px;
            border: 1px solid blue;
            background-color: blue;
            color: white;
            font-size: 20px;
            margin-top: 7px;
            margin-right: 5px;
            color: greenyellow;
        }

        .sub:hover {
            background: skyblue;
            color: red;
        }
    </style>


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


        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="">Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select><br>

        <label for="accountType">Account Type:</label>
        <select id="accountType" name="accountType" required>
            <option value="">Select Account Type</option>
            <option value="Admin">Admin</option>
            <option value="User">User</option>
        </select><br>

        <label for="password">Password:</label>
        <input class="styl" type="password" id="password" name="password" required><br>

        <label for="userAddress">Address:</label>
        <input class="styl" type="text" id="userAddress" name="userAddress" required><br>

        <!-- <label for="account_type">Account Type</label><br>
        <ul>
            <li><input class="gndr" type="radio" name="account_type" id="gen" value="Customer">Customer</li>
            <li><input class="gndr" type="radio" name="account_type" id="gen" value="Partner">Partner</li>
            <br><br>
        </ul> -->

        <!-- <label for="address">Address</label><br>
        <input class="styl" type="text" name="address" id="address" placeholder="Enter Your address"><br><br> -->

        <p id="para">By proceeding with the registration I confirm that I have read and accept the Terms and
            Conditions.<br><br>
            <span><a class="fp" href="index.php">Cancel</a></span><br>
            <input type="submit" value="Submit"><br><br>
        </p>
    </form>
</body>

</html>