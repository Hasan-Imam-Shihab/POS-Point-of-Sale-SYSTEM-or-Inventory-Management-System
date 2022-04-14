<?php
include('admin.php');

function recheck_data($input)
    {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }
    $id=$data['id'];
if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $current_pass=recheck_data($_POST['cp']);
        $new_pass=recheck_data($_POST['np']);
        $con_pass=recheck_data($_POST['conp']);
        if(!empty($current_pass) && !empty($new_pass) && !empty($con_pass))
            {
                if(($current_pass=== $data['password']) && ($new_pass===$con_pass))
                {
                $query = "UPDATE user_login_information SET password='$new_pass' where id=$id";
		        mysqli_query($con, $query);
                echo"<script type='text/javascript'> 
                                 alert('Update Sucessful') 
                                 </script>";                  
                            //header("Location: view_delete_operator.php");
                            //die;
                }
                else{
                    echo'Password Does not Match';
                }
            }
        else{
                echo'Fill all the field';
            }
    }
?>
<html>
	<head>
		<title>Password Change</title>
        <style>
            body {
    background: linear-gradient(to right, #FF4B2B, #FF416C);
}

div {
    background-color: black;
    width: 70%;
    padding: 50px;
    position: absolute;
    left: 12%;
    top: 20%;
    border-radius: 10px;
    border: 2px solid rgb(0, 0, 0);
    box-shadow: 0px 0px 20px black;
    
}
p {
    font-family: 'Jazz LET', fantasy;
    padding: 0 20px;
    font-weight:20px;
    color:white;
}
#button{
    padding: 5px;
    width: 130px;
    color: white ;
    border-radius: 15px;
    background-color: #FF416C;
    border: none;
    box-shadow: 0px 0px 10px black;
    cursor: pointer;
}

        </style>
	</head>
	<body>
		<form method="post">
			<div align="center">
				<p style='font-size: 40px;'>Change Password</p>
                <p style='font-size: 20px;'>Type Current Password :
					<input type="text" name="cp" placeholder="current password">
				</p>
                <p style='font-size: 20px;'>Type New Password :
					<input type="text" name="np" placeholder="new password">
				    <br>Confirm Password :
					<input type="text" name="conp" placeholder="confirm password">
				</p>

					<input id="button" type="submit" value="UPDATE">
                    <a href="admin_interface.php"><input id="button" value="         Back"></a>
			</div>
		</form>
	</body>
</html>