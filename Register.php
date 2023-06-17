
    <?php
    include_once 'header.php';
    include_once 'connect.php';
    if(isset($_POST['btnRegister'])){
        $gender =$_POST ['grpGender'];
        $pwd = $_POST ['pass'];
        $fName = $_POST ['usrname'];
        $email = $_POST ['email'];
        $phone = $_POST ['phone'];
        $dateBirthday = date('Y-m-d',strtotime($_POST['txtBirth']));
        $c = new Connect();
                $dblink = $c->connectToPDO();
                $sql = "INSERT INTO `user`(`email`, `fullname`, `gender`, `address`, `password`, `role`,
                 `phone`, `birthday`) VALUES (?,?,?,?,?,?,?,?)";
                //<1>
                $re = $dblink->prepare($sql);
                $stmt = $re->execute(array("$email","$fName","$gender","Cantho","$pwd","user","$phone","$dateBirthday"));
                if($stmt == TRUE){
                    echo "Congrats!";
                }else{
                    echo"Failed";
                }   
            }
        
// if (isset($_POST['register']))
// {
//     $username = isset($_POST['username']) ? trim($_POST['username']) :'';
//     $pass = isset($_POST['Pass']) ? trim($_POST['Pass']) :'';
//     $password = isset($_POST['Password']) ? trim($_POST['Password']) :'';

//     if (strlen($username) >= 30){
//         echo "<p style= 'color:red'> You username must be less than 30.</p>";
//     }
//     if (strlen($pass) <5){
//         echo "<p style= 'color:red'> You password must be greater than 5.</p>";
//     }
//     if ($pass != $password){
//         echo "<p style= 'color:red'> Password and Confirm Password is wrong.</p>";
//     }
//     }
?> 
        
            <!-- <div class="container-fluid">
                <h2>Member Registration</h2>
                <form action="" id="form1" method="post" class="needs-validation"> -->
                <?php
                    if(isset($_POST['register'])){
                     if(isset($_POST['username']) && isset($_POST['pass'])
                     && isset($_POST['password']) && isset($_POST['phone']) && isset($_POST['email']) 
                     && isset($_POST['gender']) && isset($_POST['country']) && isset($_POST['txtBirth']))
                     {
                         $username = htmlspecialchars($_POST['username']);
                         $pass = htmlspecialchars($_POST['pass']);
                         $password = htmlspecialchars($_POST['password']);
                         $phone = htmlspecialchars($_POST['phone']);
                         $email = htmlspecialchars($_POST['email']);
                         $gender = htmlspecialchars($_POST['gender']);
                         $country = htmlspecialchars($_POST['country']);
                         $txtBirth = htmlspecialchars($_POST['txtBirth']);
                            $result = "$username - $pass - $password - $phone - $email - $gender - $country - $txtBirth";
                     }
                    }
                    ?>
                    <!-- <p style="color:Red"><?php echo $result ?? "" ?></p> -->
                    <form action="#" method="POST">
                    <div class="container">
            <h2>Member Registration</h2>
            <form action="" 
            id="form1" 
            name="form1" 
            method="POST"
            class="needs-validation">
                <div class="row pb-3">
                    <label for="username" 
                    class="col-md-2
                    col-form-label">
                    Username(*):
                    </label>
                <div class="col-md-10">
                    <input type="text"
                    name="usrname"
                    id="username"
                    required
                    class="form-control" />
                </div>
                </div>

                <div class="row pb-3">
                    <label for="password"
                    class="col-md-2
                    col-form-label">
                    Password(*):
                    </label>
                <div class="col-md-10">
                    <input type="text"
                    name="pass"
                    id="password"
                    required
                    class="form-control" />
                </div>
                </div>

                <div class="row pb-3">
                    <label for="confirmpassword"
                    class="col-md-2
                    col-form-label">
                    Confirm Password(*):
                    </label>
                <div class="col-md-10">
                    <input type="text"
                    name="pass"
                    id="confpass"
                    required
                    class="form-control" />
                </div>
                </div>

                <div class="row pb-3">
                    <label for="phone"
                    class="col-md-2
                    col-form-label">
                    Phone(*):
                    </label>
                <div class="col-md-10">
                    <input type="text"
                    name="phone"
                    id="phonenumber"
                    required
                    class="form-control" />
                </div>
                </div>

                <div class="row pb-3">
                    <label for="email"
                    class="col-md-2
                    col-form-label">
                    Email(*):
                    </label>
                <div class="col-md-10">
                    <input type="text"
                    name="email"
                    id="mail"
                    required
                    class="form-control" />
                </div>
                </div>

                <div class="row pb-3">
                    <label for="gender" 
                    class="col-md-2
                    col-form-label">
                    Gender(*):
                    </label>
                <div class="col-md-10 d-flex">
                    <div class="form-check my-auto me-5">
                        <input type="radio"
                        name="grpGender"
                        id="maleRd"
                        class="form-check-input"/>
                        <label for="maleRd"
                        class="form-check-label">Male</label>
                    </div>
                    <div class="form-check my-auto">
                        <input type="radio"
                        name="grpGender"
                        id="FemaleRd"
                        class="form-check-input "/>
                        <label for="FemaleRd"
                        class="form-check-label">Female</label>
                    </div>
                    </div>
                </div>

                        <div class="row pb-3">
                    <label for="birthday" class="col-md-2 col-form-label">
                            Birthday(*):
                    </label>
                            <div class="col-md-10">
                        <input type="date" name="txtBirth" id="birthday" required class="form-control">
                    </div>
                    </div>

                       <div class="row pb-3">
                    <div class="col-md-10 ms-auto" style="text-align: left;">
                        <input type="submit" value="Register" class="btn btn-primary" name="btnRegister" id="register">
                    </div>
                    </div>
                </form>
            </div> 
         </body>
    </html> 