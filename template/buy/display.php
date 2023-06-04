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
            background-color: #f9f9f9;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
            margin-top:-16px;
            background-color:#f1f1f1;
           
            padding-top:42px;
            padding-bottom:50px;

        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            /* display:flex; */
            /* flex-wrap:wrap; */
            /* flex-basis:50%; */
         
        }

        li {
            background-color: #fff;
            padding: 35px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 96px;
            width: 471px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
            /* display:flex;
            flex-wrap:wrap;
            flex-basis:50%; */
        }

        li:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
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
            border-radius: 67px;
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
            color: #777;
            font-size: 14px;
        }

        .total-amount {
            font-size: 21px;
            margin-top: 30px;
            text-align: center;
            color: #333;
            font-family:fantasy;
        }
        .item-container {
  /* display: flex; */
  justify-content: space-between;
}
/* Per form  */
    .payment-form {
        background-color: #fff;
        padding: 20px;
        margin-top: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        border-radius: 6px;
    }

    .payment-form h2 {
        margin-top: 0;
        margin-bottom: 20px;
        color: #333;
    }

    .payment-form label {
        display: block;
        margin-bottom: 10px;
        color: #333;
    }

    .payment-form input[type="text"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .payment-form input[type="submit"] {
        padding: 10px 20px;
        background-color: #4CAF50;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    <label for="cvv">Postcode :</label>
        <input type="text" id="postcode" name="postcode" required>


    </style>
</head>
<body>
    <h1>𝕎𝕙𝕒𝕥𝕤 𝕚𝕟 𝕪𝕠𝕦𝕣 𝕔𝕒𝕣𝕥 ? </h1>
    
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
        echo "<p>Welcome : $user_name</p>";

        // Retrieve the products for the logged-in user without duplicates
        $sql = "SELECT DISTINCT p.id, p.category, p.image, p.price FROM products p
                INNER JOIN merge m ON m.p_id = p.id
                INNER JOIN user_data u ON m.u_id = u.id
                WHERE u.id = $user_id";
        $result = $mysqli->query($sql);

        $totalAmount = 0; // Variable to store the total amount

        // Check if any products exist
        if ($result->num_rows > 0) {
            $counter=0;
            $numColumns=2;
            // Loop through each product
            while ($row = $result->fetch_assoc()) {
                $productId = $row['id'];
                $category = $row['category'];
                $image = $row['image'];
                $price = $row['price'];

                // Add the price to the total amount
                $totalAmount += $price;

                if ($counter % $numColumns == 0) {
                    // Start a new row
                    echo "<div class='row'>";
                }

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

                if (($counter + 1) % $numColumns == 0 || ($counter == $result->num_rows - 1)) {
                    // Close the row
                    echo "</div>";
                }
        
                $counter++;

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

<!-- Existing code -->

<!-- Payment form -->
<div class="payment-form">
    <h2>Payment Details</h2>
    <form action="process_payment.php" method="POST">
        <label for="card-number">Card Number:</label>
        <input type="text" id="card-number" name="card-number" required>
        
        <label for="cvv">Card Verification Value (CVV):</label>
        <input type="text" id="cvv" name="cvv" required>

        <Label>Shipping :</Label>
        <!-- <p>
            There are no shipping methods available.
            Please double check your address, or contact us if you
            need any help.
        </p> -->

        <label for="country">Select Country:</label>
    <select id="country" name="country">
        <option value="USA">United States</option>
        <option value="CAN">Canada</option>
        <option value="UK">United Kingdom</option>
        <option value="AUS">Australia</option>
        <option value="EU">Europe</option>
        <!-- Add more country options as needed -->
    </select>
    <label for="cvv">Postcode :</label>
        <input type="text" id="postcode" name="postcode" required>

        <hr>
        
        <input type="submit" value="Pay Now">
    </form>
</div>


<script>
        // Access the selected country value using JavaScript
        var countrySelect = document.getElementById("country");
        var selectedCountry = countrySelect.value;
        console.log(selectedCountry); // You can use this value in your JavaScript code or send it to the server
    </script>
</body>
</html>
