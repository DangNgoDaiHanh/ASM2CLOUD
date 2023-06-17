<?php
ob_start();
session_start();
?>

</html>
<!DOCTYPE html>
<html>

<head>
    <title>TOYSHOP</title>
    <link rel="stylesheet" href="../simpleweb/css/petshop.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <meta name="viewport" content="width:device-width,
        initial-scale=1.0">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&family=Quicksand:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/fonts/icomoon/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/petshop.css">     
</head>
<nav class="navbar navbar-expand-md navbar-dark 
    bg-dark">
    <div class="container-fluid">
        <a href="http://localhost:8080/simpleweb/index.php" class="navbar-brand">
            <img src="../simpleweb/images/toylogo1.png" alt="" width="130px" height="130px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
            <span class="navbar-toggler-icon"></span>
        </button>
        <style>
            .dropdown:hover .dropdown-menu {
                display: block;
            }
        </style>
        <div class="collapse navbar-collapse" id="navbarMain">
            <div class="navbar-nav">
                <a class="nav-Link active my-auto" href="index.php">Home</a>
                <a class="nav-link" href="cart.php">Cart </a>
                <!-- <a class="nav-link" href="category_management.php">Management</a> -->

                <div class="dropdown">
                    <a href="#" class="nav-link 
                        dropdown-toggle" data-bs-toggle="dropdown">
                        Management
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="category_management.php">Category</a>
                        <a class="dropdown-item" href="proadd.php">Add product</a>

                        <!-- <a class="dropdown-item"
                        href="#">Pet clothes</a> -->
                    </div>

                    <!-- <a class="nav-link" href="#">MYKIDS </a> -->
                </div>
            </div>
            <?php

            ?>

            <!-- <div class="dropdown">
                        <a href="#" class="nav-link 
                        dropdown-toggle"
                        data-bs-toggle="dropdown">
                        Category
                    </a> -->
            <div class="dropdown-menu">
                <?php
                include_once 'connect.php';
                $c = new Connect();
                $dblink = $c->connectToMySQL();
                $sql = "SELECT * FROM category";
                $re = $dblink->query($sql);
                while ($row = $re->fetch_row()) :
                ?>
                    <a class="dropdown-item" href="<?= $row[0] ?>"><?= $row[1] ?></a>
                <?php
                endwhile;
                ?>
            </div>
        </div>


        <div class="navbar-nav ms-auto">
            <?php
            if (isset($_SESSION['user_name']));
            ?>
            <a href="./logout.php" class="nav-item 
                    nav-link">Logout</a>
            <a href="Register.php" class="nav-item 
                    nav-link">Register</a>
            <a href="login.php" class="nav-item 
                    nav-link">
                <?php
                if (isset($_SESSION['user_name'])) {
                    $display = $_SESSION['user_name'];
                    echo $display;
                } else {
                    $display = NULL;
                    echo "Log In";
                }
                ?>
            </a>
        </div>
    </div>
    </div>
    </div>
</nav>

</div>
</section>

<body>