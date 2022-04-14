<?php
session_start();
include("db_connection.php");
include("login_verify.php");
$id=verify_login($con);
$sql="SELECT * from admin_login_information where id='$id'";
    $result=mysqli_query($con, $sql);
        if($result && mysqli_num_rows($result) > 0)
        {
            $data=mysqli_fetch_assoc($result);
        }

echo'<div align="center">
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
        $query = "select * from operator_login_information";
		$result = mysqli_query($con,$query);
        if($result && mysqli_num_rows($result) > 0)
            {
                while($row = $result->fetch_assoc()) {
                    echo   '<tr>
                                <td> '.$row["id"].'</td>
                                <td> '.$row["name"].'</td>
                                <td> '.$row["username"].'</td>
                                <td> '.$row["address"].'</td>
                                <td> '.$row["gender"].'</td>
                                <td> '.$row["email"].'</td>
                                <td> '.$row["join_date"].'</td>
                            </tr>';
                }
            }
    echo'</table>
        </p>

            <a href="create_account.php"><input id="button" value=" Create New Operator Account"></a>
            <a href="admin_interface.php"><input id="button" value="         Back"></a>
    </div>';
?>
<html>
	<head>
		<title>Operator List</title>
        <link rel="stylesheet" href="create_account.css">
	</head>
	<body>
	</body>
</html>