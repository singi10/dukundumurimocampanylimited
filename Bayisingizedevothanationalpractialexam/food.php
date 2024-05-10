<?php
        include_once "./auth/connection.php";

        if (isset($_POST['add'])) {
            $fdname = $_POST['foodname'];
            $fdowner = $_POST['foodownername']; 
            $tel = $_POST['email'];
            
            $sql = mysqli_query($conn,"INSERT INTO foods(foodname,foodownername,email) VALUE ('{$fdname}','{$fdowner}','{$tel}')");
    
            if ($sql == true) {
                // echo "Record inserted <a href='./index.php'>Go back</a>";
                echo "<h1>Record inserted! </h1><label class='message'> Click on Home to see your record inserted!</label>";

            }
            else {
                echo "Not inserted";
            }
        }
    
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product | Page </title>
    <link rel="shortcut icon" href="./img/logo.PNG" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="./style/food.css">
</head>
<body>
        <header>
            <img src="./img/logo.PNG" alt="">
            <div class="links">
                <a href="./index.php">Home</a>
                <a href="./viewimport.php">Import</a>
                <a href="./viewexport.php">Export</a>
                <a href="./report.php">Report</a>
                <a href="./auth/logout.php" class="log">Logout</a>
            </div>
        </header>
   <aside>
    <fieldset>
        <legend>Add foods </legend>
    <form action="" method="POST">
            <label for="foodname">food Name</label>
            <input type="text" name="foodname">
            <label for="foodownername">food Ownername</label>
            <input type="text" name="foodownername">
            <label for="email">email</label>
            <input type="email" name="email">
        <input type="submit" value="add foods" name="add" class="submit">
    </form>
    </fieldset>
    </aside><br><br>
    <footer>
        <div class="footer-container">
            <div class="footer-logo">
                <img src="./img/logo.PNG" alt="Dukundumurimo Company Limited">
        </div>
        <div class="footer-info">
                <p>Dukundumurimo Company Limited</p>
                <p>Location: Muhanga District</p>
                <p>Phone: 0726098351</p>
                <p>Email: dukundumurimo@gmail.com</p>
            </div>
        </div>
        <div class="footer-social">
            <ul>
                <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                <li><a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
            </ul>
        </div>
            <p>&copy; 2024 Dukundumurimo company limited. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>