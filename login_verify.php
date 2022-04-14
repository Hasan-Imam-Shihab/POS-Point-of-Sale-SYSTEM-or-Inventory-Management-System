<?php
function verify_login($con)
{
    if(isset($_SESSION['id']))
    {
        $id=$_SESSION['id'];
        return $id;
    }
    else{
        header("Location:index.html");
    }
}
?>