<?php 
include('admin.php');
$o_id = $_GET['id'];
function recheck_data($input)
    {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }
    $query = "select * from user_login_information where id=$o_id";
    $result1 = mysqli_query($con,$query);
    if($result1 && mysqli_num_rows($result1) > 0)
        {
            $data_operator=mysqli_fetch_assoc($result1);

        }
if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $operator_name=recheck_data($_POST['operator_name']);
        $email=recheck_data($_POST['email']);
        $old_password=recheck_data($_POST['old_password']);
        $password=recheck_data($_POST['password']);
        $address=recheck_data($_POST['address']);
        $gender=recheck_data($_POST['gender']);
        $join_date=recheck_data($_POST['join_date']);
        if(!empty($operator_name))
            {
                $query4 = "UPDATE user_login_information SET name='$operator_name' where id=$o_id";
		        mysqli_query($con, $query4);
            }
        if(!empty($email))
            {
                $sql4 = "UPDATE user_login_information SET email='$email' where id=$o_id";
		        mysqli_query($con, $sql4);
            }
        if(!empty($password) &&!empty($old_password) && $old_password===$data_operator['password'])
            {
                $sql5 = "UPDATE user_login_information SET password='$password' where id=$o_id";
		        mysqli_query($con, $sql5);
            }
        if(!empty($address))
            {
                $sql6 = "UPDATE user_login_information SET address='$address' where id=$o_id";
		        mysqli_query($con, $sql6);
            }
        if(!empty($gender))
            {
                $sql7 = "UPDATE user_login_information SET gender='$gender' where id=$o_id";
		        mysqli_query($con, $sql7);
            }
         if(!empty($join_date))
            {
                $sql8 = "UPDATE user_login_information SET join_date='$join_date' where id=$o_id";
		        mysqli_query($con, $sql8);
            }
               
                            echo"<script type='text/javascript'> 
                                 alert('Update Sucessful') 
                                 </script>";                  
                            //header("Location: view_delete_operator.php");
                            //die;
    }
?>
<html>
	<head>
		<title>Edit Information</title>
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
				<p style='font-size: 40px;'>Edit Operator Information</p>
                <p style='font-size: 20px;'>Operator Name :
					<input type="text" name="operator_name" placeholder="<?php echo $data_operator['name']; ?>">
				    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;User Name : <?php echo $data_operator['username']; ?>
				</p>
                <p style='font-size: 20px;'>Email :
                    <input type="text"  name="email" placeholder="<?php echo $data_operator['email']; ?>" >
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Current  Password :
					<input type="text" name="old_password" placeholder="********">
				</p>
                <p style='font-size: 20px;'>New Password :
					<input type="text" name="password" placeholder="Type New Password">
				    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Address :
					<input type="text" name="address" placeholder="<?php echo $data_operator['address']; ?>">
				</p>
            <p style='font-size: 20px;'>Gender : <?php echo $data_operator['gender']; ?>
                    <input type="radio" name="gender" value="Male" required >Male
                    <input type="radio" name="gender" value="Female" required>Female<br>
				    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Joining Date : <?php echo $data_operator['join_date']; ?>
					<input type="date" name="join_date" placeholder="<?php echo $data_operator['join_date']; ?>">
               
				</p>

					<input id="button" type="submit" value="UPDATE">
                    <a href="http://localhost/2018-1-60-070_project/create_view_delete_account.php"><input id="button" value="         Back"></a>
			</div>
		</form>
	</body>
</html>