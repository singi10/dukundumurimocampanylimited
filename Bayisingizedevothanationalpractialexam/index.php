<?php
    include_once "./auth/connection.php";
    if (!isset($_SESSION['managerid'])) {
        header("location: ./auth/login.php");
    }

    $sql = mysqli_query($conn, "SELECT * FROM foods");
    $num_rows = mysqli_num_rows($sql);
    $tbody = '';

    if ($num_rows > 0) {
        $a = 0;
        while ($fetch = mysqli_fetch_assoc($sql)) {
            $a++;
            $tbody .= '<tr>
            <td>'.$a.'</td>
            <td>'.$fetch['foodname'].'</td>
            <td>'.$fetch['foodownername'].'</td>
            <td><a href="./update.php?id='.$fetch['foodid'].'">update</a></td>
            <td><a href="./delete.php?id='.$fetch['foodid'].'">delete</a></td>
            <td><a href="./import.php?id='.$fetch['foodid'].'">import</a></td>
            

        </tr>';
        }
    }
    else {
        $tbody .= "<tr><td colspan='4'>no record</td></tr>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Page</title>
    <link rel="shortcut icon" href="./img/logo.PNG" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="./style/index.css">
</head>
<body>
    <div class="body">
        <header>
            <img src="./img/logo.PNG" alt="">
            <div class="links">
                <a href="./index.php" class="index">Home</a>
                <a href="./viewimport.php">Import</a>
                <a href="./viewexport.php">Export</a>
                <a href="./report.php">Report</a>
                <a href="./auth/logout.php" class="log">Logout</a>
            </div>
        </header>
        <aside>
            <h1>Table  Of  foods </h1>
            <a href="food.php" class="a">Add your favorite food</a>
            <button onclick="print()">PRINT</button>
        <table border="2">
            <thead>
                <tr>
                    <th>No</th>
                    <th>food name</th>
                    <th>food ownername</th>
                    <th colspan="3">Action</th>
                
                </tr>
            </thead>
            <tbody>
                <?php 
                    echo $tbody; 
                ?>
                <tr>
                    <td>Total:</td>
                    <td colspan="6"><?php echo $num_rows; ?></td>
                </tr>
            </tbody>
        </table>
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

    </div>
</body>
</html>