<?php
session_start();
include("db_connection.php");
include("operator_login_verify.php");
$id=verify_operator_login($con);
$sql="SELECT * from user_login_information where id='$id'";
    $result=mysqli_query($con, $sql);
        if($result && mysqli_num_rows($result) > 0)
        {
            $data=mysqli_fetch_assoc($result);
        }
?>