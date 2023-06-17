<!-- 
<?php
?>


<?php
include_once 'footer.php';
?> -->

<?php
    session_start();

    unset($_SESSION['user_name']);
    unset($_SESSION['email']);
    header("Location: index.php");
?>