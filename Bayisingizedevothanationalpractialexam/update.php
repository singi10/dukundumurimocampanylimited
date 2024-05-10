<?php
    include_once "./auth/connection.php";
    
    if (!isset($_GET['id'])) {
        header("location: ./index.php");
      }
    $id = $_GET['id'];
    $sql = mysqli_query($conn,"SELECT * FROM foods WHERE foodid = '{$id}' ");
    $form = '';

    if ($sql == true) {
        $fetch = mysqli_fetch_assoc($sql);
        $form = '<fieldset>
                        <legend>Update foods</legend>
                    <form action="" method="POST">
                            <label for="foodname">food Name</label>
                            <input type="text" name="foodname" value = "'.$fetch['foodname'].'" disable >
                            <label for="foodownername">food Owner</label>
                            <input type="text" name="foodownername" value = "'.$fetch['foodownername'].'" disable >
                            <label for="tel">email</label>
                            <input type="text" name="email" value = "'.$fetch['email'].'">
                        <input type="submit" name="submit" value="update foods" class="submit">
                    </form>
                </fieldset>';
    }else {
        echo "Not selected";
    }
    if (isset($_POST['submit'])) {
        $fdname = $_POST['foodname'];
        $fdowner = $_POST['foodownername'];
        $tel = $_POST['email'];

        $sql = mysqli_query($conn,"UPDATE `foods` SET `foodname`='$fdname',`foodownername`='$fdowner',`email`='$tel' WHERE foodid = '{$id}'");
        if ($sql = true) {
            // echo "<h1>Record updated! </h1><label class='message'> Click on Home to see your record updated!</label>";
            header("location: ./index.php");
        }
        else {
            echo "record not updated";
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
    <link rel="stylesheet" type="text/css" href="./style/update.css">
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
    <?php echo $form; ?>
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