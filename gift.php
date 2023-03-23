<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gift </title>

    <!-- External CSS Files -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">

</head>

<body>

<?php
    include("nav.php ");
?>

    <div id="giftCtrl">
        <div class="container">
            <h2 class="giftTitleMix">
                Shipping Address
                <span>(Please Fill Out Your Information)</span>
            </h2>
            <form action="#">
                <div class="row">
                    <div class="col-md-6">
                       <div class="giftForm giftBox">
                        <h3 class="giftTitle">Gift From</h3>
                        <div class="singleInput">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                        </div>
                        <div class="singleInput">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="singleInput">
                            <input type="text" name="address" id="address" class="form-control" placeholder="Address">
                        </div>
                        <div class="singleInput">
                           <textarea name="comment" id="comment" cols="30" rows="10" placeholder="Comment" class="form-control"></textarea>
                        </div>
                       </div>
                    </div>
                    <div class="col-md-6">
                        <div class="giftForm giftBox">
                            <h3 class="giftTitle">Gift To</h3>
                            <div class="singleInput">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                            </div>
                            <div class="singleInput">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="singleInput">
                                <input type="text" name="address" id="address" class="form-control" placeholder="Address">
                            </div>
                            <div class="singleInput">
                               <textarea name="comment" id="comment" cols="30" rows="10" class="form-control" placeholder="Comment"></textarea>
                            </div>
                           </div>
                    </div>

                    <div class="text-center mt-5">
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </div>

                </div>
            </form>
        </div>
    </div>

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