<?php
session_start();
include("db_connection.php");
include("login_verify.php");
function recheck_data($input)
{
	$input = trim($input);
	$input = stripslashes($input);
	$input = htmlspecialchars($input);
	return $input;
}
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $username=recheck_data($_POST['username']);
    $password=recheck_data($_POST['password']);
}
if(!empty($username) and !empty($password))
{
    $sql="SELECT * from user_login_information where username='$username' and type='admin'";
    $result=mysqli_query($con, $sql);
    if(!$result)
    {
        echo "No Account with this username";
    }
    else{
        if($result && mysqli_num_rows($result) > 0)
        {
            $data=mysqli_fetch_assoc($result);
            if($password==$data['password'])
            {
                $_SESSION['id']=$data['id'];
                header("Location: admin_interface.php");
				die;
            }
            else{
                echo "Wrong Password";
            }

        }
        else{
            echo "No Account with this username";
        }
    }
}
else{
    echo "Required All the Field";
}
?>