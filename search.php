<?php
include_once 'header.php';
?>
<!-- <div class="container px-4 py-5">
    <div class="row d-flex justify-content-center align-items-center p-3">
<div class="col-md-8">
  <div class="search">
    <i class="fa fa-search cus-fa"></i>
    <form class="example1" action="search.php">     
        <input type="text" class="form-control" placeholder="Search..."  name="search">
        <button class="btn btn-primary" name="btnSearch">Search</button>
        </form>  
  </div>
</div>
</div> -->
<div class="container px-4 py-5">

    <h2>All product</h2>
    <div class="row">
        <?php
        include_once 'connect.php';
        $c = new Connect();
        $dblink = $c->connectToPDO();
        $sql = "SELECT * FROM product WHERE Name LIKE ?";
        //  $sql = "SELECT * FROM product WHERE Name LIKE CONCAT ('%',:NameP,'%')";
        // <1>
        $re = $dblink->prepare($sql);

        $nameP = $_GET['search'];
        // $re->bindParam(':NameP',$nameP,
        // PDO::PARAM_STR);

        $re->execute(array("%$nameP%"));

        $rows = $re->fetchAll(PDO::FETCH_BOTH);
        foreach ($rows as $r) :

        ?>

            <div class="col-lg-4 pb-3">
                <div class="card">
                    <img src="./images/<?= $r['Image'] ?>" class="card-img-top" alt="Product1>" style="margin: auto;
                        width: 200px;" />
                    <div class="card-body">
                        <a href="detail.php?id=<?= $r['pid'] ?>" class="text-decoration-none">
                            <h5 class="card-title"><?= $r['Name'] ?>
                            </h5>
                        </a>
                        <h6 class="card-subtitle mb-2 text-muted">
                            <span>&#8363;</span><?= $r['Price'] ?>
                        </h6>
                        <form action="cart.php" class="text-center"><button type="submit" class="btn btn-dark ">Add to Cart</a></form>
                    </div>
                </div>
            </div>
        <?php
        endforeach;
        ?>
    </div>
</div>
</div>