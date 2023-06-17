<?php
    
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

<!--add product-->
<fieldset>

<!-- Form Name -->
<legend>PRODUCTS</legend>
<div id="main" class="container">     
        <div className="page-heading pb-2 mt-4 mb-2 ">
        <h1>ADD NEW PRODUCT</h1>
        </div>
        
            <div id="main" class="container mt-4">     
                        <form class="form-vertical" method="POST" action="#" enctype="multipart/form-data">
                            <div class="form-body">
                                <div class="row">

                            <table>
                            <div class="form-group">
                                <tr>
                                    <th>Product ID:</th>
                                        <td><input type="text" name="pid" value=""></td>
                                </tr>
                                <div class="form-group">
                                <tr>
                                    <th>Product Name:</th>
                                        <td><input type="text" name="Name" value=""></td>
                                </tr> 

                                <tr>
                                    <th>Price:</th>
                                        <td><input type="text" name="Price" value=""></td>
                                </tr> 
                                <div class="form-group">
                                <tr>
                                    <th>Status:</th>
                                        <td><input type="text" name="Status" value=""></td>
                                </tr>
                                <div class="form-group">
                                <tr>
                                    <th>Quantity:</th>
                                        <td><input type="text" name="Quantity" value=""></td>
                                </tr>
                                <div class="form-group">
                                <tr>
                                    <th>PCartID:</th>
                                        <td><input type="text" name="pCart_id" value=""></td>
                                </tr> 
                            </table> 
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="image-vertical">Image</label>
                                            <input type="file" name="Pro_image" 
                                            id="Pro_image" 
                                            class="form-control" value="">
                                        </div>
                                        
                                    </div>
                                    <div class="col-12 d-flex mt-3 justify-content-center">
                                        <button type="submit"  
                                        class="btn btn-warning me-1 mb-1 rounded-pill" 
                                        name="btnSubmit">Submit</button>
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
