<?php
include_once("connect.php");
include_once("header.php");

$c = new connect();
$dblink = $c->connectToPDO();
if(isset($_SESSION['user_name'])){
    $user = $_SESSION['user_name'];
    // $user_id=$_SESSION['user_id'];
    $user_email=$_SESSION['email'];
    if(isset($_GET['pid'])){
        $p_id=$_GET['pid'];
        $sqlSelect1= "SELECT pid FROM cart WHERE user_id=? AND pid=?";
        $re = $dblink->prepare($sqlSelect1);
        $re->execute(array("$user","$p_id"));

        if($re->rowCount() == 0){
            $query = "INSERT INTO cart (user_id, pid, pCount, date) 
            VALUES(?,?,1,CURDATE())";
    }else{
        $query = "UPDATE cart SET pCount = pCount + 1 WHERE user_id=? and pid=?";
    }
    $stmt = $dblink->prepare($query);
    $stmt->execute(array("$user","$p_id"));
    }
    else if(isset($_GET['del_id'])){
    $cart_del = $_GET['del_id'];
    $query = "DELETE FROM cart WHERE cart_id=?";
    $stmt = $dblink->prepare($query);
    $stmt ->execute(array($cart_del));
    }
    $sqlSelect = "SELECT * FROM cart c, product p WHERE c.pid = p.pid AND user_id =?";
    $stmt1 = $dblink->prepare($sqlSelect);
    $stmt1->execute(array($user));
    $rows = $stmt1->fetchAll(PDO::FETCH_BOTH);
}else{
header("Location:login.php");
}

?>
<div class="container px-4 py-5" style="float:left">
    <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
    <h6 class="mb-0 text-muted"><?=$stmt1->rowCount()?> item(s)</h6>
    <table class="table">
        <tr style="color:black">
            <th>Productname</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
    <?php
        foreach($rows as $row){
            $total = 0;
            $Price = $row['pCount'] * $row['Price'];
            $total = $total + $Price;
            ?>
            <tr>
                <td style="color:black"><?=$row['Name']?></td>
                <td style="color:black"><input id="form1" min="0" name="Quantity" value="<?=$row['pCount']?>" type="number"
                class="form-control form-control-sm"/></td>
                <td><h6 class="mb-0"><span>&#8363;</span><?=$total?></h6></td>
                <td style="color:black"><a href="cart.php?del_id=<?=$row['cart_id']?>" class="text-muted text-decoration-none">X</a></td>
            </tr>
            <?php
            }
            ?>
    </table>
    <hr class="my-4">
    <div class="pt-5">        
    <h6 class="mb-0"><a href="index.php" class="fw-bold mb-0 text-black">
        <i class="fa fa-fa-long-arrow-alt-left me-2"></i >Back to shop</a></h6>

<?php
include_once("footer.php");
?>
