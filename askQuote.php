<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ask/Quote</title>

    <!-- External CSS Files -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">

</head>

<body>
<?php
    include("nav.php ");
  ?>

    <section id="askAndQuote">
        <div class="container">
            <h2 class="sectionTitle text-center">FAQ</h2>

           
            <div class="row">
                <div class="col-md-6">
                    <div class="questions">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                              <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  Question One
                                </button>
                              </h2>
                              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                  Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maiores, assumenda amet possimus laboriosam quam non sed eligendi, nulla deserunt ex iure! Quam corrupti, adipisci eligendi, molestiae rem quae debitis quo labore dignissimos impedit doloremque ullam!
                                </div>
                              </div>
                            </div>
                            <div class="accordion-item">
                              <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                  Question two
                                </button>
                              </h2>
                              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                 Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor architecto aperiam veniam sint consequatur at possimus debitis cumque nihil, dolorem eligendi? Vel illum provident fugit quae dolore, at recusandae aliquam labore magnam minima, porro distinctio.
                                </div>
                              </div>
                            </div>
                            <div class="accordion-item">
                              <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                  Question three
                                </button>
                              </h2>
                              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                 Lorem, ipsum dolor sit amet consectetur adipisicing elit. Earum facere ipsam recusandae quae ex ducimus porro ab tenetur architecto in ratione, quas esse sit explicabo odit deserunt numquam, atque, dignissimos voluptates at. Officia, nam quos.
                                </div>
                              </div>
                            </div>
        
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThreea">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThreea" aria-expanded="false" aria-controls="collapseThreea">
                                    Question four
                                  </button>
                                </h2>
                                <div id="collapseThreea" class="accordion-collapse collapse" aria-labelledby="headingThreea" data-bs-parent="#accordionExample">
                                  <div class="accordion-body">
                                   Lorem, ipsum dolor sit amet consectetur adipisicing elit. Earum facere ipsam recusandae quae ex ducimus porro ab tenetur architecto in ratione, quas esse sit explicabo odit deserunt numquam, atque, dignissimos voluptates at. Officia, nam quos.
                                  </div>
                                </div>
                              </div>
        
                              <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThrees">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThrees" aria-expanded="false" aria-controls="collapseThrees">
                                    Question five
                                  </button>
                                </h2>
                                <div id="collapseThrees" class="accordion-collapse collapse" aria-labelledby="headingThrees" data-bs-parent="#accordionExample">
                                  <div class="accordion-body">
                                   Lorem, ipsum dolor sit amet consectetur adipisicing elit. Earum facere ipsam recusandae quae ex ducimus porro ab tenetur architecto in ratione, quas esse sit explicabo odit deserunt numquam, atque, dignissimos voluptates at. Officia, nam quos.
                                  </div>
                                </div>
                              </div>
                          </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex align-items-center justify-content-center">
                    <img src="Resources/Images/faq.png" alt="faq" class="img-fluid w-75">
                </div>
            </div>

            <div class="comment">
                <h3 class="LeftAQ">Left a question:</h3>
                <form action="">
                    <input type="email" name="email" id="emailForComment" class="form-control" placeholder="Enter your email here!" required>
                    <div class="form-group">
                      <textarea class="form-control" name="" id="Question" placeholder="Your question" rows="3" required></textarea>
                    </div>
                    <input type="submit" value="Send" class="btn sendBtn btn-primary">
                </form>
            </div>


        </div>
    </section>
    <section class="footer">
        <div class="snetwork">
            <p class="pnetwork">Get contacted with us on social network.</p>
            <a href="https://web.facebook.com/"><img class="pic" src="Resources/Images/facebook.jpg" alt=""></a>
            <a href="https://www.instagram.com/"><img class="pic" src="Resources/Images/instragram.jpg" alt=""></a>
            <a href="https://www.google.com/"><img class="pic" src="Resources/Images/google.jpg" alt=""></a>
            <a href="https://www.twitter.com"><img class="pic" src="Resources/Images/twiter.jpg" alt=""></a>
            </div>
            <div class="footer2">
            <div class="linkup">
                <div class="step3">
                <h4 id="three">About Agriculture</h4>
                <p id="agriculture">Bangladesh produces a variety of agricultural products such as rice, wheat, corn, legumes, fruits, vegetables, meat, fish, seafood, and dairy products. Rice is the main staple in the Bangladeshi diet.</p>

                </div>
        <div class="step4">
            <h4 class="three">Customer Care</h4>
            <a class="none" href="">Help Center</a><br>
            <a class="none" href="">How ro Order</a><br>
            <a class="none" href="">Returns & Refunds</a><br>
            <a class="none" href="">Contuct Us</a><br>
        </div>
        <div class="step5">
            <h4 class="three">Sell Product</h4>
            <a class="none" href="">Tree</a><br>
            <a class="none" href="">Seedling Tree</a><br>
            <a class="none" href="">Seed</a><br>
            <a class="none" href="">Organic Fertilizer</a><br>
            <a class="none" href="">chemical Fertilizer</a><br>
            
        </div>
        <div class="step6">
            <h4 class="three">E-Tree Zone</h4>
            <a class="none" href="">Gift</a><br>
            <a class="none" href="">Benifits</a><br>
            <a class="none" href="">Ask/Quote</a><br>
            <a class="none" href="">My Account</a><br>
        </div>
        
        <div class="step7">
            <h4 class="three">Language</h4>
            <a class="none" href="">BD</a><br>
            <a class="none" href="">EN</a><br>
            
        </div>
    </div>
    </div>
    </section>


    <!-- External JS Files -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>