<?php
include("operator.php");
?>
<html>
	<head>
		<title>Admin Interface</title>
        <link rel="stylesheet" href="interface.css">
	</head>
	<body>
        <div id="button" style="left: 10%; top: 5%; width:75%; background-color: #ffffff10; " >
        <p style="text-align: center; font-size: 200%;">Hello! <?php echo "$data[name]"; ?></p>
        <p style="text-align: center; font-size: 100%;">Welcome as an Operator</p>
        </div>
        <div id="button" style="left: 10%; top: 33%; width:75%; background-color: #ffffff10; height: 15%; " ></div>
        <a href="operator_insert_delete_product.php"><input id="button" style="left: 21.5%;" value="Manage Produuct"></a>
        <a href="operator_sell_product.php"><input id="button" style="left: 60.5%;" value="Sell Product"></a>
        <a href="operator_logout.php"><input id="button" style="left: 40%; top: 85%; color: red ;" value="Log Out"></a>
	</body>
</html>