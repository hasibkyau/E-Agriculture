<?php
require_once("connect.php");

    $sql = "select *from users ORDER BY id DESC LIMIT 1";
    //$sql = "select *from login_user";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    //echo " " . $row["ID"]; 

    $id = $row["ID"];
    $sql = "SELECT * FROM users WHERE ID = '$id'";
    $result = mysqli_query($conn, $sql);
    $r = mysqli_fetch_assoc($result);

    $_SESSION['login'] = 1;
    $_SESSION['ID'] = $r["ID"];
    $_SESSION['FirstName'] = $r["FirstName"];
    $_SESSION['LastName'] = $r["LastName"];
    $name = $_SESSION['FirstName'];
    $id = $_SESSION['ID'];
    $_SESSION['EmailAddress'] = $r["EmailAddress"];
    $_SESSION['PhoneNumber'] = $r["PhoneNumber"];
    $_SESSION['Gender'] = $r["Gender"];
    $_SESSION['AccountType'] = $r["AccountType"];
    $_SESSION['UserAddress'] = $r["UserAddress"];

?>

<?php
  if(isset($_POST['login']))
	{
		
 		$ID = $_POST['ID'];
  		$UserPassword = $_POST['UserPassword'];

   if(!empty($ID) and !empty($UserPassword))
   {
     $sql = "SELECT * FROM user_info WHERE ID = '$ID' AND UserPassword = '$UserPassword'";

     if($result = mysqli_query($conn, $sql)){
         if(mysqli_num_rows($result) > 0){
            $in = "INSERT INTO login_user(`ID`) VALUES ('$ID')";      
		    mysqli_query($conn,$in);		 
            header("Location:profile.php");
         }
         else
            echo "invalid id or password";
         
     }
   }

  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Agriculture</title>

    <link rel="stylesheet" href="agriculture.css">

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

    <header id="header" class="sticky-top">
        <div class="container-fluid px-md-0">
            <div class="mainNav">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="#">
                        <img src="1.jpg" alt="" class="img-fluid">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            <!-------    Home     ------->
                            <!--
                            <div class="dropdown-container">
                            -->
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Home</a>
                            </li>
                            <!--
                            <div class="dropdown-content">
                            
                            </div>
                            </div>
                            -->
                            <li class="nav-item">
                                <a class="nav-link" href="#">Gift</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Benifits</a>
                            </li>
                            <!----------- About Us----------->
                            <!--
                            <div class="dropdown-container">
                                -->
                            <li class="nav-item">
                                <a class=" nav-link" href="#">About Us</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">Ask/Quote</a>
                            </li>
        
                            <li class="nav-item">
                                <a class="nav-link" href="#">My Account</a>
                            </li>
                            <li id="Partner" class="nav-item">
                                <a class="nav-link" href="partner.php">Partner</a>
                            </li>

                        </ul>
                        <form class="form-inline my-2  my-lg-0">

                            <img src="search.png" alt="search" class="img-fluid search" data-toggle="modal"
                                data-target="#exampleModalCenter">
                            <a class="nav-link" id="loginBtn" href="login.php">Log In</a>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <section id="searchModal">
        <div class="container">

            <!-- Modal.1 -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="search" class="form-control" id="searchBox"
                                    placeholder="What are you looking for?">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script>
        var p_name = "<?php echo "$name" ?>";
        var id = "<?php echo "$id" ?>";
        if (id) {
            document.getElementById("loginBtn").innerHTML = "Login";
            document.getElementById("loginBtn").href="login.php";

        } else {
            document.getElementById("loginBtn").innerHTML = "Logout";
            document.getElementById("loginBtn").href="index.php";
        }

    </script>
    </td>

</body>

</html>