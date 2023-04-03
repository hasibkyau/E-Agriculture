<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Title</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/style.css">
    
</head>

<body>
<?php
    include("nav.php ");
    ?>


    <!-- ================ CONTACT HEADER START ================= -->

    <section id="sarvice-header" class="text-center text-light">
        <div class="container">
            <div class="row">
                <div class="col pt-5">
                    <h2 class="text-dark">Contact Us</h2>
                    <p class="text-dark lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, saepe.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ================ CONTACT HEADER END ================= -->


    <!-- ================ CONTACT PART START ================= -->

    <section id="contacts" class="py-5">
        <div class="container">
            <form action="https://formspree.io/f/xlekpobr" method="POST">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title text-center">Please fill out this form to contact us</h3>
                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="firstName" placeholder="First Name" id="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="lastName" placeholder="Last Name" id="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="subject" placeholder="Subject" id="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="country" placeholder="Country" id="" required>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-12 p-0">
                                        <div class="form-group">
                                            <input type="text" name="message" id="message" placeholder="Message" class="form-control py-5">
                                        </div>
                                    </div>
                                    <div>
                                        <input class="form-control btn btn-dark" type="submit" value="Submit">
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h4>Get In Touch</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto, consequuntur.</p>
                                <h4>Address</h4>
                                <p>House #359/2, Lorem ipsum, lorem</p>
                                <h4>Email</h4>
                                <p>test@demo.com</p>
                                <h4>Phone</h4>
                                <p class="lead mb-0">+88 0123-456-789-00</p>
                                <p class="lead mb-0">+88 0123-456-789-00</p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </section>

    <!-- ================ CONTACT PART END ================= -->


    <!-- ================ COPYRIGHT START ================= -->

    <?php
    include("footer.php ");
    ?>

    <!-- ================ COPYRIGHT END ================= -->

    <!-- JS FILES -->
    <script src="js/jquery.slim.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>