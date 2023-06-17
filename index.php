<head>
    <link rel="stylesheet" href="../simpleweb/css/petshop.css">
</head>

<?php
include_once 'header.php';
?>

<div class="container px-4 py-5">
    <div class="row d-flex justify-content-center align-items-center ">
        <div class="col-md-8">
            <div class="search">
                <!-- <i class="fa fa-search cus-fa"> </i> -->
                <form class="pet-search" action="search.php">
                    <div class="row">
                        <div class="col-10"><input type="text" class="form-control" placeholder="Search here" name="search"></div>
                        <div class="col-2 p-0"><button class="btn btn-dark" name="btnSearch">Search</button></div>
                    </div>
                </form>
            </div>
        </div>

        <div class="container py-3">
            <h2 class="">All product</h2>
            <div class="row">
                <?php
                include_once 'connect.php';
                $c = new Connect();
                $dblink = $c->connectToMySQL();
                $sql = "SELECT * FROM product";
                // $name = $_GET['search'];
                // <1>
                $re = $dblink->query($sql);

                $re->data_seek(0);
                if ($re->num_rows > 0) :
                    while ($row = $re->fetch_assoc()) :
                ?>

                        <div class="col-lg-4 pb-3">
                            <div class="card">
                                <img src="./images/<?= $row['Image'] ?>" class="card-img-top" alt="Product1>" style="margin: auto;
                        width: 200px;" />
                                <div class="card-body">
                                    <a href="detail.php?id=<?= $row['pid'] ?>" class="text-decoration-none">
                                        <h5 class="card-title"><?= $row['Name'] ?>
                                        </h5>
                                    </a>
                                    <h6 class="card-subtitle mb-2 text-muted">
                                        <span>&#8363;</span><?= $row['Price'] ?>
                                    </h6>
                                </div>
                                <form action="cart.php" method="GET" class="text-center"><button type="submit" class="btn btn-dark ">Add to Cart</a></form>
                                </div>
                        </div>
                <?php
                    endwhile;
                else :
                    echo "Not found";
                endif;
                ?>
            </div>
        </div>
        <footer>
            <p class="text-center">&copy 2022 Pet Shop All Rights Reserved </p>
        </footer>