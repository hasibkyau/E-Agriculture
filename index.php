<?php
// connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'project');

// check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Agriculture</title>

    <link rel="stylesheet" href="CSS/index.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    include("nav.php ");
    ?>

    <?php

    $categories = array('Fruit', 'Flower', 'Vegetables', 'Outdoor', 'Indoor');

    // $category = 'all';
    // Get the selected category from the request parameters
    if (isset($_GET['category'])) {
        $category = mysqli_real_escape_string($conn, $_GET['category']);
        if (!in_array($category, $categories)) {
            $category = '';
        }
    } else {
        $category = '';
    }

    // Build the SQL query
    if ($category) {
        // echo $category;
        $sql = "SELECT * FROM products WHERE product_status ='approved' AND category = '$category'";
    } else {
        $sql = "SELECT * FROM products WHERE product_status ='approved'";
    }
    $sql .= " ORDER BY name";

    // Execute the query and get the results
   


    if (isset($_GET['search'])) {
        $search =  $_GET['search'];
        // echo $search;
        $sql = "SELECT * FROM products WHERE product_status ='approved' AND name LIKE '%$search%' OR description LIKE '%$search%'";

    } 
    $result = mysqli_query($conn, $sql);

    if (isset($_GET['AddToCart'])){
        $product_id = $_GET['AddToCart'];
        $customer_id = $_SESSION['ID'];
        // echo $customer_id;
        $query = "INSERT INTO cart (customer_id, product_id) VALUES ($customer_id, $product_id);";
        mysqli_query($conn, $query);

    }
    ?>


    <section id="controllFiltering">
        <div class="container">
            <h1 class="sectionTitle text-center">
                Choose and plant your trees
            </h1>
            <p class="sectionSubTitle text-center">
                Have you ever thought about planting a tree? It is a simple gesture, which has a great impact.
                It will benefit the environment and people, while also becoming an original gift for the ones
                you love. Plant a tree, let's green the planet!
            </p><br><br>
            <!---->


            <div class="row">
                <div class="col-6">


                    
                    <form action="" method="get">
                        <div class="input-group">
                        <label class="form-label" for="form1"></label>
                            <select class="form-control" name="category" id="category">
                                <option value="" selected>All</option>
                                <?php foreach ($categories as $cat) : ?>
                                    <option value="<?php echo $cat; ?>" <?php echo ($category == $cat) ? 'selected' : ''; ?>><?php echo ucfirst($cat); ?></option>
                                <?php endforeach; ?>
                            </select>
                            <input class=" btn-success" type="submit" value="Filter">
                        </div>

                    </form>

                </div>

                <div class="col-6">
                    <form action="" method="get">
                        <div class="input-group">
                            <label class="form-label d-flex" for="form1"></label>
                            <input type="search" name="search" id="search" class="form-control" />
                            <!-- <input class=" btn-success" type="submit" value="Filter"> -->

                            <button type="submit" value="search" type="button" class="btn">
                                <!-- <i class="fas fa-search">Search</i> -->
                                <img src="Resources/Images/search.png" alt="search" class="img-fluid search" data-toggle="modal" data-target="#exampleModalCenter">
                            </button>

                        </div>
                    </form>
                </div>
            </div>



        </div>
        </div>
    </section>

    <section id="headLine">
        <div class="container">
            <div class="row">
                <!---->
                <?php
                // retrieve all products from the database
                // $sql = "SELECT * FROM products WHERE product_status = 'approved'";
                // $result = mysqli_query($conn, $sql);
                // session_start();

                // check if any products were found
                if (mysqli_num_rows($result) > 0) {
                    // display each product on the page
                    while ($row = mysqli_fetch_assoc($result)) {
                        $path = "uploads/products/";
                        $imgName = $row['image'];
                        $src = $path . $imgName;

                        $price = 'Price: ';
                        $val = $row['price'];
                        $tk = ' /-';
                        $cost = $price . $val . $tk;

                        $see_more = 'See More';

                        echo "<div class='col-lg-3'>";

                        echo "<div class='card mt-3' data-toggle='modal' data-target='#image-modal-" . $row['id'] . "'>";
                        echo "<img class='card-img-top'  src='" . $src . "' alt='" . $row['name'] . "' width='200' height='200'>";
                        echo "<div class='card-body'>";
                        echo "<div class='card-title'>";
                        echo "<h2  class='fruit'>" . $row['name'] . "</h2>";
                        echo "</div>";
                        // echo "<p>" . $row['description'] . "</p>";
                        echo "<p class='card-text'>" . $cost . "</p>";
                        echo "</div>";
                        echo "</div>";


                        // Create a Bootstrap modal for each image
                        echo "<div class='modal fade' id='image-modal-" . $row['id'] . "' tabindex='-1' role='dialog' aria-labelledby='image-modal-label-" . $row['id'] . "' aria-hidden='true'>";
                        echo "<div class='modal-dialog' role='document'>";
                        echo "<div class='modal-content'>";
                        echo "<div class='modal-header'>";
                        echo "<h5 class='modal-title' id='image-modal-label-" . $row['id'] . "'>" . $row['name'] . "</h5>";
                        echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                        echo "<span aria-hidden='true'>&times;</span>";
                        echo "</button>";
                        echo "</div>";
                        echo "<div class='modal-body'>";
                        echo "<img src='" . $src . "' alt='" . $row['image'] . "' class='img-fluid'>";
                        echo "<h2  class='fruit'>" . $row['name'] . "</h2>";
                        echo "<p>" . $row['description'] . "</p>";
                        echo "<p class='card-text'>" . $cost . "</p>";
                        echo "</div>";

                        echo " <form class='form-group mx-auto'  method='get'>";
                        echo "   <button name='AddToCart' type='submit' value='". $row['id']."' type='button' class='btn btn-secondary'>Add to Cart</button>";
                        echo "</form>";

                        echo "<div class='modal-footer'>";

                        echo " <a class='btn btn-primary' href='OrderNow.php?id=" . $row['id'] . "'> Order Now <a/>";
                        
                        // echo " <a class='btn btn-secondary' href='MyCart.php?id=" . $row['id'] . "'> Add to Cart <a/>";




                        echo "<button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>";



                        echo "</div>";

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
    </section>

    <section class="">
        <div class="step2">
            <h1 class="two">Have you ever thought about planting trees every month?</h1>
            <p class="para2">the profile that’s the best fit for you and start planting trees every month.
                Whether you’re a Rookie, Hero or Master, you’ll find the right one for you.</p>
        </div>
    </section>

    <?php
    include("footer.php ");
    ?>


</body>

</html>