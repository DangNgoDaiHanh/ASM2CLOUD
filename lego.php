<?php
    include_once 'header.php';
    ?>
    <?php
                $c = new connect();
                $dblink = $c->connectToPDO();
                
                
                $sql = "SELECT * FROM product WHERE pCart_id LIKE ?";
               
                $re = $dblink->prepare($sql);
                             
                $re-> execute(array("H01"));
                $rows = $re->fetchAll(PDO::FETCH_BOTH);
	          
                foreach ($rows as $r): 
                    
                ?>
                    <div class="col-md-4 pb-3">
                        <div class="card">
                            <img
                            src="../simpleweb/images/<?=$r['Image']?>"
                            class="card-img-top"
                            alt="Product1>" style="margin: auto;
                            width: 300px; height: 250px"
                            >
                            <div class="card-body">
                                <a href="detail.php?id=<?=$r['pid']?>" class="text-decoration-none">
                                <h5 class="card-title"><?=$r['Name']?></h5></a>
                                <h6 class="card-subtitle mb-2 text-muted"><span>&#8363;</span><?=$r['Price']?></h6>
                                <a href="cart.php" class="btn btn-primary">Add to cart</a>
                            </div>
                        </div>
                    </div>
                            <?php
                            endforeach; 
                            ?>