<?php
function verify_operator_login($con)
{
    if(isset($_SESSION['operator_id']))
    {
        $id=$_SESSION['operator_id'];
        return $id;
    }
    else{
        header("Location:operator_login.html");
    }
}
?>