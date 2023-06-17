<?php
    // include_once './header.php';
    include_once 'connect.php';
    $c = new Connect();
    $dblink = $c->connectToPDO();

    if(isset($_POST['btnSubmit'])){
        $pid = $_POST['pid'];
        $Name = $_POST['Name'];
        $Price = $_POST['Price'];
        $Status = $_POST['Status'];
        $Quantity = $_POST['Quantity'];
        $pCart_id = $_POST['pCart_id'];
        $img = str_replace(' ', '-', $_FILES['Pro_image']['name']);
        $storedImage = "./images/";
        $flag = move_uploaded_file($_FILES['Pro_image']['tmp_name'], $storedImage.$img);

        $sql = "INSERT INTO `product`(`pid`, `Name`, `Price`, `Status`, `Image`, `Quantity`, `pCart_id`) VALUES (?,?,?,?,?,?,?)";
        $re = $dblink->prepare($sql);
        $stmt = $re->execute([$pid, $Name, $Price, $Status, $img, $Quantity, $pCart_id]);

        if($stmt == TRUE){
            echo "Added successfully!";
        } else{
            echo "Failed";
        }
    }
?>

<!-- add product -->
<fieldset>

<!-- Form Name -->
<!-- <legend>PRODUCTS</legend> -->
<div id="main" class="container">     
        <div className="page-heading pb-2 mt-4 mb-2 ">
        <h1 style="text-align:center">ADD NEW PRODUCT</h1>
        </div>
        
            <div id="main" class="container mt-4">     
                        <form class="form-vertical" method="POST" action="#" enctype="multipart/form-data">
                            <div class="form-body">
                                <div class="row" style="padding-left: 600px;">

                            <table class="col-10">
                            <div class="form-group">
                                <!-- <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Product ID</label>
                                        <input type="text" class="form-control" name="pID" id="exampleFormControlInput1" placeholder="">
                                    </div> -->
                                <tr>
                                    <th style="font-size: 20px;">Product ID:</th>
                                        <td><input type="text" name="pid" value="" style="width: 500px; height:40px; font-size: 20px; margin: auto;"></td>
                                </tr>
                                <div class="form-group">
                                <tr>
                                    <th style="font-size: 20px;">Product Name:</th>
                                        <td><input type="text" name="Name" value="" style="width: 500px; height:40px; font-size: 20px; margin: auto;"></td>
                                </tr> 

                                <tr>
                                    <th style="font-size: 20px;">Price:</th>
                                        <td><input type="text" name="Price" value="" style="width: 500px; height:40px; font-size: 20px; margin: auto;"></td>
                                </tr> 
                                <div class="form-group">
                                <tr>
                                    <th style="font-size: 20px;">Status:</th>
                                        <td><input type="text" name="Status" value="" style="width: 500px; height:40px; font-size: 20px; margin: auto;"></td>
                                </tr>
                                <div class="form-group">
                                <tr>
                                    <th style="font-size: 20px;">Quantity:</th>
                                        <td><input type="text" name="Quantity" value="" style="width: 500px; height:40px; font-size: 20px; margin: auto;"></td>
                                </tr>
                                <div class="form-group">
                                <tr>
                                    <th style="font-size: 20px;">PCartID:</th>
                                        <td><input type="text" name="pCart_id" value="" style="width: 500px; height:40px; font-size: 20px; margin: auto;"></td>
                                </tr> 
                            </table> 
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="image-vertical" style="font-size: 25px; padding-left: 30px;">Image:</label>
                                            <input type="file" name="Pro_image" 
                                            id="Pro_image" 
                                            class="form-control" value="" style="font-size: 20px; padding-left: 33px">
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex mt-3 justify-content-center" style="padding-left:350px;">
                                        <button type="submit"  
                                        class="btn btn-warning me-1 mb-1 rounded-pill" 
                                        name="btnSubmit" style="font-size: 22px; border-radius:5px; background-color: cornflowerblue; color: white; font-weight:bold">Submit</button>
                                    </div>                                    
                                </div>   
                            </div>
                        </form>
                        <div class="form-group pb-3">
                <div class="col-sm-offset-2 col-sm-10">
                        <input type="button" class="btn btn-primary" name="btnIgnore"  id="btnIgnore" value="Back to homepage" onclick="window.location.href='index.php'" />      
                </div>
            </div> 
    </div> <!--main-->
</fieldset>
