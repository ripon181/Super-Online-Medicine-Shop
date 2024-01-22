<?php
include 'includes/header.php';
?>

<div class="container">
    <div class="row" style="margin-top: 150px; margin-bottom: 150px;">
        <?php
        include 'connection/db_connection.php';

        if (isset($_POST['add_to_cart'])) {
           $name=$_POST['name'];
           $price=$_POST['price'];
           $image=$_POST['image'];
           $quantity=1;

           $select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE name='$name'");
            if (mysqli_num_rows($select_cart) > 0) {
                // Product Already Added
                echo "<script>alert('Product Already Added');</script>";
            } else {
                $insert_product = mysqli_query($conn, "INSERT INTO `cart` (name, price, image, quantity) VALUES ('$name', '$price', '$image', '$quantity')");
                // Product Added To The Cart
                echo "<script>alert('Product Added To The Cart');</script>";
            }
        }
        // Query to fetch products
        $sql = "SELECT * FROM products WHERE category = '2'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="col-md-3 mb-3">';
                echo '<div class="card" style="width: 18rem; border: 2px solid #166c00;">';
                echo '<img class="card-img-top" src="admin/uploads/' . $row['image'] . '" alt="Card image cap" style="height:160px;">';
                echo '<div class="card-body" style="background: linear-gradient(45deg, #00b531, #00a5d738);">';
                echo '<h5 class="card-title d-flex justify-content-center">' . $row['name'] . '</h5>';
                echo '<p class="card-text text-justify">' . $row['description'] . '</p>';
                echo '<h5 class="d-flex justify-content-center">৳ ' . $row['price'] . '</h5>';
                echo '<form method="POST" action="">';
                echo '<input type="hidden" name="name" value="' . $row['name'] . '">';
                echo '<input type="hidden" name="price" value="' . $row['price'] . '">';
                echo '<input type="hidden" name="image" value="' . $row['image'] . '">';
                echo '<input type="submit" name="add_to_cart" class="btn btn-primary w-100" value="Add To Cart">';
                echo '</form>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "No products available.";
        }

        $conn->close();
        ?>
    </div>
    </div>

<?php
include 'includes/footer.php';
include 'includes/modal.php';
?>
