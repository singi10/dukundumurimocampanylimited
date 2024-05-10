<?php

    include_once "./auth/connection.php";

    if (!isset($_GET['id'])) {
        header(" location: ./viewimport.php");
    }
    $id = $_GET['id'];
    $sql= mysqli_query( $conn,"SELECT * FROM import INNER JOIN foods ON import.foodid = foods.foodid WHERE importid = '{$id}' ");
    $form = '';

    if ($sql == true) {
        $fetch = mysqli_fetch_assoc($sql);
        $form .= '<fieldset>
                        <legend>Update import food</legend>
                        <form action="" method="POST">
                            <div class="" >
                                <label for="fooddname">food Name</label>
                                <input type="text" name="foodname" value = "'.$fetch['foodname'].'" disable >
                            </div>
                            <div class="">
                                <label for="foodownername">food Ownername</label>
                                <input type="text" name="foodownername" value = "'.$fetch['foodownername'].'" disable >
                            </div>
                            <div class="">
                                <label for="quantity">quantity</label>
                                <input type="text" name="quantity" value = "'.$fetch['quantity'].'">
                            </div>
                            <div class="">
                                <label for="date">date</label>
                                <input type="date" name="date" value = "'.$fetch['importdate'].'">
                            </div>
                            <input type="submit" name="submit" value="Update imported foods" class="submit">
                        </form>
                    </fieldset>';
    }

    if (isset($_POST['submit'])) {
        $quantity = $_POST['quantity'];
        $date = $_POST['date'];

        $sql= mysqli_query($conn,"UPDATE import SET quantity='{$quantity}',`importdate`='{$date}' WHERE importid = '{$id}' ");
        if ($sql) {
            header("location: ./viewimport.php");
        }
        else {
            echo "not updated";
        }
    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product | Page</title>
    <link rel="shortcut icon" href="./img/logo.PNG" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="./style/i_update.css">
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
        
        <?php echo $form;  ?>
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