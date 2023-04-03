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

<?php
      if (isset($_POST['submit'])) {

        $answer = $_POST['answer'];
        $id = $_POST['submit'];

        // echo $answer;


        $conn = mysqli_connect('localhost', 'root', '', 'project');
        $query = "UPDATE faq SET answer = '$answer' WHERE id = '$id';";
        mysqli_query($conn, $query);
      }
      ?>

    <section id="askAndQuote">
        <div class="container">
            <h2 class="sectionTitle text-center">FAQ</h2>


            <div class="row">

                <?php

                // check if any products were found
                $conn = mysqli_connect('localhost', 'root', '', 'project');
                $sql = "SELECT * FROM faq";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    // display each product on the page
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='col-6'>";
                        echo "<div class='card m-2'>";
                        echo "<div class='card-body m-2'>";
                        echo "<form method='post'>";
                        echo "<div class='form-group'>";
                        echo "<label class='h3  text text-primary text-lg'>" ."Q: " . $row['question'] . "</label>";
                        echo "<textarea class='h3 form-control' name='answer' id='Question' placeholder='Your Answer' rows='3' required>" .$row['answer']. "</textarea>";
                        echo "</div>";
                        echo "<button type='submit' value='".$row['id']."' name='submit' class='btn sendBtn btn-primary'>" ." Answer". "</button>";
                        echo "</form>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                }
                ?>

            </div>
        </div>
        <?php
    include("footer.php ");
    ?>


    <!-- External JS Files -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>