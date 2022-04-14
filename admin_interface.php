<?php
include('admin.php');
?>
<html>
	<head>
		<title>Admin Interface</title>
        <link rel="stylesheet" href="interface.css">
	</head>
	<body>
        <div id="button" style="left: 10%; top: 5%; width:75%; background-color: #ffffff10; " >
        <p style="text-align: center; font-size: 200%;">Hello! <?php echo "$data[name]"; ?></p>
        <p style="text-align: center; font-size: 100%;">Welcome to Admin Panel</p>
        </div>
        <div id="button" style="left: 10%; top: 33%; width:75%; background-color: #ffffff10; height: 15%; " ></div>
        <a href="create_view_delete_account.php"><input id="button" style="left: 11.5%;" value="Manage Operator"></a>
        <a href="sell_product.php"><input id="button" style="left: 31.5%;" value="Sell Product"></a>
        <a href="insert_delete_product.php"><input id="button" style="left: 51.5%;" value="Manage Product"></a>
        <a href="report.php"><input id="button" style="left: 71.5%;" value="Generate Report"></a>
        <a href="change_password.php"><input id="button" style="left: 40%; top: 70%; color: red ;" value="want to change password?"></a>
        <a href="logout.php"><input id="button" style="left: 40%; top: 85%; color: red ;" value="Log Out"></a>
	</body>
</html>