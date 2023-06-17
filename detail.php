<?php
include_once 'header.php';
?>
<div class="container px-4 py-5">
    <?php
    if (isset($_GET['id'])) :
        $pid = $_GET['id'];
        require_once 'connect.php';
        $conn = new Connect();
        $db_link = $conn->connectToPDO();
        $sql = "SELECT * FROM `product` WHERE pid = ?";
        $stmt = $db_link->prepare($sql);
        $stmt->execute(array($pid));
        $re = $stmt->fetch(PDO::FETCH_BOTH);
    ?>
        <div class="row">
            <div class="col-6">
                <h2><?= $re['Name'] ?></h2>
                <div>

                    <img src="./images/<?= $re['Image'] ?> " style="width:40%" />
                </div>
            </div>
            <div class="col-6">
                <form action="">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-4">
                                <label for="price" class="text-start">Price</label>
                            </div>
                            <div class="col-8">
                                <input type="email" class="form-control" id="price" aria-describedby="emailHelp" disabled placeholder=<?= $re['Price'] ?>>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label for="quantity" class="text-start">Quantity</label>
                        </div>
                        <div class="col-8">
                            <div class="number">
                                <span class="forQuantity minus"><div class="operation">-</div></span>
                                <input type="text" class="quantity" value="1" />
                                <span class="forQuantity plus"><div class="operation">+</div></span>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <!-- <form action="cart.php"></form>
                        <button type="submit" class="btn btn-dark mt-4">Add to Cart</button></div> -->
                </form>
                <ul style="list-style-type:none;" class="list-group">
                    <!-- <li class="list-group-item">Price:<div class="price"><?= $re['Price'] ?></div>
                    </li>
                    <br>
                    <td>
                        <input id="form1" min="0" name="Quantity" value="<?= $row['pCount'] ?>" type="number" class="form-control form-control-sm" />
                    </td> -->
                    <form action="cart.php" method="GET">
                        <div class="">
                            <input type="hidden" name="pid" value="<?= $pid ?>">
                            <input type="submit" class="btn btn-dark mt-4" name="btnAdd" value="Add to cart" />
                        </div>
                    </form>
                </ul>
            <?php
        else :
            ?>
                <h2>Nothing to show</h2>
            <?php
        endif;
            ?>
            </div>
        </div>
</div>
<script>
    $(document).ready(function() {
        $('.minus').click(function() {
            var $input = $(this).parent().find('input');
            var count = parseInt($input.val()) - 1;
            count = count < 1 ? 1 : count;
            $input.val(count);
            $input.change();
            return false;
        });
        $('.plus').click(function() {
            var $input = $(this).parent().find('input');
            $input.val(parseInt($input.val()) + 1);
            $input.change();
            return false;
        });
    });
</script>
<?php
include_once 'footer.php';
?>