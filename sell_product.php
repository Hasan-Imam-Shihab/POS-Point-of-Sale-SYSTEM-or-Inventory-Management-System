<?php
session_start();
include('admin.php');
?>
<html>
	<head>
		<title>Sell Product</title>
        <link rel="stylesheet" href="sell.css">
	</head>
	<body>
		<form method="post">
			<div>
				<p align="center" style='font-size: 40px;'>Transaction: Sell Product</p>
                <p style='font-size: 20px;'>Search Product: 
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Product Name">
                Sell Quantity
                            <td><input type="number" id="auto" name="quantity" onchange="grabVal(event)" min="1" max="100" value="1"></td>
                            <script>
                                var data1=1;
                               function grabVal(event){
                                data1= document.getElementById("auto").value;
                               }          
                </script>
                </p>
    <?php
    $total='00';
    echo'<table id="data" style="color: white; width: 58%;" border="1">
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Product Description</th>
            <th>Price/Unit</th>
            <th>Available Quantity</th>
            <th>Sell</th>
            <th></th>
        </tr>';
        $query = "select * from product_name";
        $result = mysqli_query($con,$query);
        if($result && mysqli_num_rows($result) > 0)
            {
                while($row = $result->fetch_assoc()) {
                    echo   '<tr>
                            <td> '.$row["id"].'</td>
                            <td> '.$row["product_name"].'</td>';
                            $abc=$row["id"];
                            $s="SELECT * from product_details where product_id='$abc'";
                            $result1=mysqli_query($con, $s);
                            if($result1 && mysqli_num_rows($result1) > 0)
                                {
                                    $p_data=mysqli_fetch_assoc($result1);
                                }
                     echo  '<td> '.$p_data["prooduct_description"].'</td>
                            <td> '.$p_data["price_per_unite"].'tk/'.$p_data["unit"].'</td>
                            <td> '.$p_data["quantity"].''.$p_data["unit"].'</td>';
                        echo'<td><a href="add.php/?id='.$row["id"].'" onclick="location.href=this.href+ &#39&xyz=&#39 +data1;return false;"><input id="button" value="         ADD"></td>
                        </tr>';
            }
        }
    echo'</table>
            </p>
                <a href="admin_interface.php"><input id="button" value="         Back"></a>';
    ?>
                <div id='parent' style="background-color: white; left: 58%; top: 20%;width: 40%;">
                    <p align="center" style='font-size: 40px; color:black;'> Sell Receipt</p>
                    <?php 
                    $tid='100001';
                    $trid="SELECT MAX(t_id ) as old_id FROM transaction";
                    $rtrid=mysqli_query($con, $trid);
                    if($rtrid && mysqli_num_rows($rtrid) > 0)
                                {
                                    $tid_data=mysqli_fetch_assoc($rtrid);
                                    $tid=$tid_data['old_id']+1;
                                }
                    ?>
                    <p style='font-size: 12px; color:black;'>Operate By: <?php echo $data['name']; ?></p>
                    <p style='font-size: 14px; color:black;'>Transaction Id: <?php echo $tid; ?></p>
                    <table style="width:100%;">
                        <tr>
                            <th>ID</th>
                            <th>Item Name</th>
                            <th>Quantity</th>
                            <th>Price/Unit</th>
                            <th>Total</th>
                        </tr>
                        <?php
                        $query = "select * from sell_product";
                        $result = mysqli_query($con,$query);
                        if($result && mysqli_num_rows($result) > 0)
                            {   
                                $total='0';
                                while($row = $result->fetch_assoc()) {
                                    echo   '<tr>
                                    <td> '.$row["product_id"].'</td>';
                                    $prd_id=$row["product_id"];
                                    $sq="SELECT * from product_name where id='$prd_id'";
                                    $result3=mysqli_query($con, $sq);
                                    if($result3 && mysqli_num_rows($result3) > 0)
                                        {
                                            $prd_data=mysqli_fetch_assoc($result3);
                                            echo  '<td> '.$prd_data["product_name"].'</td>';
                                            $sqls="SELECT * from product_details where product_id='$prd_id'";
                                            $result4=mysqli_query($con, $sqls);
                                            if($result4 && mysqli_num_rows($result4) > 0)
                                                {
                                                    $prd_details=mysqli_fetch_assoc($result4);
                                                    echo'<td> '.$row["sell_quantity"].''.$prd_details["unit"].'</td>';
                                                    echo  '<td> '.$prd_details["price_per_unite"].'tk/'.$prd_details["unit"].'</td>';
                                                    $a=$prd_details["price_per_unite"];
                                                    $b=$row["sell_quantity"];
                                                    $c=$a*$b;
                                                    echo'<td>'.$c.'</td>';
                                                    $total=$total+$c;
                                                }
                                        }
                                        echo'<td><a href="delete.php/?id='.$prd_id.'">delete</a></td></tr>';
                                }
                            }
                        ?>

                    </table>
                    ____________________________________________________________________
                    <p style='font-size: 14px; color:black; text-align: left;'>Total: <?php echo $total; ?></p>
                    <p style='font-size: 12px; color:black; text-align: left;'>Total Vat(5%): <?php $vat=$total*.05; echo $vat; ?> </p>
                    <p style='font-size: 12px; color:red; text-align: left;'>discount(5%): <?php $dis=$total*.05; echo $dis; ?> </p>
                    ____________________________________________________________________
                    <p style='font-size: 16px; color:black; text-align: left;'>Grand Total: <?php $total= $total+$vat-$dis; echo $total; ?></p>
                    
			    </div>
                <?php
                echo '<a href="complete.php/?t_id='.$tid.' "><input type="button" id="button" value="Print" onclick="myApp.printDiv()" /></a>';
                ?>
            </div>
		</form>
	</body>
    <script src="script.js"></script>
</html>