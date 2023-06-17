<?php
include_once("connect.php");
session_start();
?>
<?php
if (isset($_POST['btnLogin'])) {
	if (isset($_POST['txtPass']) && isset($_POST['txtEmail'])) {
		$pwd = $_POST['txtPass'];
		$email = $_POST['txtEmail'];
		$c = new Connect();
		$dblink = $c->connectToPDO();
		$sql = "SELECT * FROM user WHERE email = ? and password = ?";
		$stmt = $dblink->prepare($sql);
		$re = $stmt->execute(array("$email", "$pwd"));
		$numrow = $stmt->rowCount();
		$row = $stmt->fetch(PDO::FETCH_BOTH);
		if ($numrow == 1) {
			echo "Login succsessfully";
			$_SESSION['user_name'] = $row['fullname'];
			$_SESSION['email'] = $row['email'];
			header("Location: index.php");
		} else {
			echo "Something wrong with your info<br>";
		}
	} else {
		echo "Please enter your info";
	}
}
1
?>


<div class="container">
	<h2 class="pt-3">Member Login</h2>
	<form id="form1" name="form1" method="POST" 
	action="login.php">

	<div class="row">
		<div class="form-group">				    
			<label for="txtEmail" class="col-sm-2 control-label">Email(*):  </label>
			<div class="col-sm-10">
				<input type="email" name="txtEmail" id="txtEmail" class="form-control" placeholder="Email" value=""/><br><br>
			</div>
		</div>  
		
		<div class="form-group">
			<label for="txtPass" class="col-sm-2 control-label">Password(*):  </label>			
			<div class="col-sm-10">
					<input type="password" name="txtPass" id="txtPass" class="form-control" placeholder="Password" value=""/><br><br>
			</div>
		</div> 
		<div class="form-group pt-3"> 
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<input type="submit" name="btnLogin"  class="btn btn-primary" id="btnLogin" value="Login"/>
				<input type="reset" name="btnCancel"  class="btn btn-primary" id="btnCancel" value="Cancel"onclick=" window.location.href='index.php'"/>
			</div>  
		</div>
	</div>	
	</form> 
</div>

<?php
include_once 'footer.php';
?>