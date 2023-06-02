<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            color: #333;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        li {
            background-color: #f9f9f9;
            padding: 10px;
            margin-bottom: 10px;
        }

        li:nth-child(even) {
            background-color: #f2f2f2;
        }

        .product-info {
            display: flex;
            align-items: center;
        }

        .product-info img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-right: 20px;
        }

        .product-details {
            flex: 1;
        }

        .product-details h3 {
            margin: 0;
            color: #333;
            font-size: 18px;
        }

        .product-details p {
            margin: 5px 0;
        }

        .total-amount {
            font-size: 18px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Product List</h1>
    <ul>
        <?php
        $sname = "localhost";
        $uname = "root";
        $pass = "";
        $db_name = "arthive_db";

        // Create the database connection
        $mysqli = mysqli_connect($sname, $uname, $pass, $db_name);

        // Check the connection
        if (!$mysqli) {
            die('Connection failed');
        }

        // Retrieve the user's name
        $user_id = $_SESSION["user_id"];
        $nameSql = "SELECT name FROM user_data WHERE id = $user_id";
        $nameResult = $mysqli->query($nameSql);
        $user_name = $nameResult->fetch_assoc()["name"];

        // Print the user's name
        echo "<p>User Name: $user_name</p>";

        // Retrieve the products for the logged-in user without duplicates
        $sql = "SELECT DISTINCT p.id, p.category, p.image, p.price FROM products p
                INNER JOIN merge m ON m.p_id = p.id
                INNER JOIN user_data u ON m.u_id = u.id
                WHERE u.id = $user_id";
        $result = $mysqli->query($sql);

        $totalAmount = 0; // Variable to store the total amount

        // Check if any products exist
        if ($result->num_rows > 0) {
            // Loop through each product
            while ($row = $result->fetch_assoc()) {
                $productId = $row['id'];
                $category = $row['category'];
                $image = $row['image'];
                $price = $row['price'];

                // Add the price to the total amount
                $totalAmount += $price;

                // Display the product details
                echo "<li>";
                echo "<div class='product-info'>";
                echo "<img src='./image/$image' alt='Product Image'>";
                echo "<div class='product-details'>";
                echo "<h3>Product ID: $productId</h3>";
                echo "<p>Category: $category</p>";
                echo "<p>Price: $$price</p>";
                echo "</div>";
                echo "</div>";
                echo "</li>";
            }
        } else {
            // No products found
            echo "<li>No products found.</li>";
        }

        // Close the database connection
        mysqli_close($mysqli);
        ?>

        <!-- Display the total amount -->
        <p class="total-amount">Total Amount: $<?php echo $totalAmount; ?></p>
    </ul>
</body>
</html>
