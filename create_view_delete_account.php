<?php
include('admin.php');
function recheck_data($input)
    {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }
if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $name=recheck_data($_POST['name']);
        $username=recheck_data($_POST['username']);
        $password=recheck_data($_POST['password']);
        $address=recheck_data($_POST['address']);
        $gender=recheck_data($_POST['gender']);
        $email=recheck_data($_POST['email']);
        $join_date=recheck_data($_POST['join_date']);
        if(!empty($name) and !empty($username) and !empty($password) and !empty($address) and !empty($gender) and !empty($email) and !empty($join_date))
            {
                $sqs="SELECT * from user_login_information where username='$username'";
                $res=mysqli_query($con, $sqs);
                if(mysqli_num_rows($res) > 0)
                {
                    echo"<script type='text/javascript'> 
                        alert('User Name Taken') 
                        </script>"; 
                }
                else{
                    
                        $query = "insert into user_login_information (name,username,password,address, gender, join_date,email,type) values ('$name','$username','$password', '$address', '$gender', '$join_date','$email', 'operator')";
                        $result=mysqli_query($con, $query);
                        if(!$result)
                            {
                                echo "Some thing went Wrong";
                            }
                        else{
                            echo"<script type='text/javascript'> 
                            alert('Account Created Sucessfully') 
                            </script>";                 
                            //header("Location: create_view_delete_account.php");
                            //die;
                        }
                }
        }
        else
            {
                echo " Fill All the Required Information";
            }
    }
    echo'<div align="center" style="top: 75%;">
    <p style="font-size: 40px;">Operator List</p>
    <p style="font-size: 20px;">
    <table style="color: white;" border="2">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>UserName</th>
            <th>Address</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Joining Date</th>
        </tr>';
    $query = "select * from user_login_information where id!='1'";
    $result = mysqli_query($con,$query);
    if($result && mysqli_num_rows($result) > 0)
        {
            while($row = $result->fetch_assoc()) {
                $o_id=$row["id"];
                echo   '<tr>
                            <td> '.$row["id"].'</td>
                            <td> '.$row["name"].'</td>
                            <td> '.$row["username"].'</td>
                            <td> '.$row["address"].'</td>
                            <td> '.$row["gender"].'</td>
                            <td> '.$row["email"].'</td>
                            <td> '.$row["join_date"].'</td>
                            <td><a id="button" href="edit_operators_account.php/?id='.$o_id.'">Edit</a></td>
                        </tr>';
            }
        }
    echo'</table>
            </p>
                <a href="admin_interface.php"><input id="button" value="         Back"></a>
        </div>';
?>
<html>
	<head>
		<title>Create Operator Account</title>
        <link rel="stylesheet" href="create_account.css">
	</head>
	<body>
		<form method="post">
			<div align="center">
				<p style='font-size: 40px;'>Create Operator Account</p>
                <p style='font-size: 20px;'>Full Name :
					<input type="text" name="name" placeholder="Operator Name" required>
				    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;UserName :
					<input type="text" name="username" placeholder="UserName" required>
				</p>
				<p style='font-size: 20px;'>Password :
					<input type="password" name="password" placeholder="Password" required>
				    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Address :
					<input type="text" name="address" placeholder="Operator Address" required>
				</p>
                <p style='font-size: 20px;'>Gender :
					<input type="radio" name="gender" value="Male" required>Male
                    <input type="radio" name="gender" value="Female" required>Female
				    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email Address :
					<input type="text" name="email" placeholder="Email Address" required>
				</p>
                <p style='font-size: 20px;'>Joining Date :
					<input type="date" name="join_date"  required>
				</p>

					<input id="button" type="submit" value="Create Account">
			</div>
		</form>
	</body>
</html>