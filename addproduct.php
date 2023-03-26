<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="CSS/addproduct.css">

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
    include("nav.php ");
    ?>


    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $type = $_POST['type'];
        $quantity = $_POST['quantity'];

        $target_dir = "uploads/products/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $new_filename = uniqid() . "." . $imageFileType;
        $target_path = $target_dir . $new_filename;
        
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_path)) {
            $conn = mysqli_connect('localhost', 'root', '', 'project');

            // session_start();
            $user_id = $_SESSION['ID'];

            $sql = "INSERT INTO products (user_id, name, description, price, image, type, quantity) VALUES ('$user_id', '$name', '$description', '$price', '$new_filename', '$type', '$quantity')";

            if (mysqli_query($conn, $sql)) {
                echo "Product uploaded successfully.";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

            mysqli_close($conn);
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    ?>


    <section>
        <div class="container mb-6">
            <!-- <h1 id="APIPIS"> Input system for upload tree or any product</h1> -->
            <div class="row">
                <h2 class=" head mx-auto m-5">Add Product</h2>
            </div>

            <div class="row">
                <div class="col-6">


                    <form method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label id="style"class="font-weight-bold text-dark" for="product_name">Product Name*</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="name"
                                placeholder="Enter Product Name" required>
                        </div>

                        <div class="form-group">
                            <label id="style"class="font-weight-bold text-dark mt-2" for="">Products Description*</label><br>
                            <input class="form-control" name="description" required><br>
                        </div>


                        <div class="form-group">
                            <label id="style" class="font-weight-bold text-dark" for="">Product Photo*</label><br>
                            <input class="form-control" type="file" name="image" required><br>
                        </div>

                        <button class="btn btn-primary" type="submit" value="Submit">Add Product</button><br><br>
                        <!-- </form> -->
                </div>



                <div class="col-6">

                    <label id="style" class="font-weight-bold text-dark" for="">Product Type*</label><br>
                    <select class="form-control options" name="type" required>
                        <option value="Fruit">Fruit</option>
                        <option value="Flower">Flower</option>
                        <option value="Seedling">Seedling</option>
                        <option value="Seeds">Seeds</option>
                        <option value="Vegetables">Vegetables</option>
                        <option value="Organic Fertilizer">Organic Fertilizer</option>
                        <option value="Chemical Fertilizer">Chemical Fertilizer</option>
                    </select><br>

                    <div class="form-group">
                        <label id="style" class="font-weight-bold text-dark" for="">Products Price*</label><br>
                        <input class="form-control" type="text" name="price" required><br>
                    </div>


                    <div class="form-group">
                        <label id="style" class="font-weight-bold text-dark" for="">Products Quantity*</label><br>
                        <input class="form-control" type="number" name="quantity" required><br>
                    </div>

                    </form>
                </div>
            </div>


        </div>

</section>

<?php
    include("footer.php ");
    ?>

</body>

</html>