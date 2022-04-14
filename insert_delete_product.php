<?php
include('admin.php');
function recheck_data($input)
    {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }
    $quantity=0;
    $price_per_unite=0;
if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $product_name=recheck_data($_POST['product_name']);
        $prooduct_description=recheck_data($_POST['prooduct_description']);
        $unit=recheck_data($_POST['unit']);
        $price_per_unite=recheck_data($_POST['price_per_unite']);
        $in=$data['username'];
        $s_price_per_unite=$price_per_unite+($price_per_unite*.1);
        if(!empty($product_name) and !empty($unit) and !empty($prooduct_description))
            {
                $query = "insert into product_name (product_name, inserted_by) 
                          values ('$product_name','$in')";
		        $result1=mysqli_query($con, $query);
                $sqls="SELECT * from product_name where product_name='$product_name'";
                $result=mysqli_query($con, $sqls);
                if($result && mysqli_num_rows($result) > 0)
                    {
                        $product_data=mysqli_fetch_assoc($result);
                    }
                    $product_id=$product_data['id'];
                $sql = "insert into product_details (product_id,quantity,prooduct_description,unit, price_per_unite) 
                          values ('$product_id','0','$prooduct_description', '$unit', '$s_price_per_unite')";
		        $result2=mysqli_query($con, $sql);
                $sql7 = "insert into purchase_price (product_id,purchase_price) 
                          values ('$product_id','$price_per_unite')";
		        $result7=mysqli_query($con, $sql7);
                if(!$result1)
                    {
                        echo "Some thing went Wrong";
                    }
                else{
                    if(!$result2)
                        {
                            echo "Some thing went Wrong";
                        }
                        else{
                            if(!$result7)
                            {
                                echo "Some thing went Wrong";
                            }
                            else{
                                echo"<script type='text/javascript'> 
                                 alert('Product Inserted Sucessfully') 
                                 </script>";                  
                                header("Location: insert_delete_product.php");
		                        die;
                            }
                        }
                }
            }
        else
            {
                echo " Fill All the Required Information";
            }
    }
    echo'<div align="center" style="top: 75%;">
    <p style="font-size: 40px;">Product List</p>
    <p style="font-size: 20px;">
    <table style="color: white;" border="2">
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Product Description</th>
            <th>Unit</th>
            <th>Purchase Price/Unit</th>
            <th>SEll Price/Unit</th>
            <th>Quantity</th>
            <th>Inserted By</th>
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
                            $s2="SELECT * from purchase_price where product_id='$abc'";
                            $result2=mysqli_query($con, $s2);
                            if($result2 && mysqli_num_rows($result2) > 0)
                                {
                                    $pp_data=mysqli_fetch_assoc($result2);
                                }
                     echo  '<td> '.$p_data["prooduct_description"].'</td>
                            <td> '.$p_data["unit"].'</td>
                            <td> '.$pp_data["purchase_price"].'</td>
                            <td> '.$p_data["price_per_unite"].'</td>
                            <td> '.$p_data["quantity"].'</td>
                            <td> '.$row["inserted_by"].'</td>
                            <td><a href="update.php/?p_id='.$abc.'" ><input id="button" value="         Update"></td>
                            <td><a href="purchase_product.php/?p_id='.$abc.'"><input id="button" value=" Purchase Product"></a></td>
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
		<title>Product Management</title>
        <link rel="stylesheet" href="create_account.css">
	</head>
	<body>
		<form method="post">
			<div align="center">
				<p style='font-size: 40px;'>Insert New Product</p>
                <p style='font-size: 20px;'>Product Name :
					<input type="text" name="product_name" placeholder="Product Name" required>
				</p>
                <p style='font-size: 20px;'>Product Description :
                    <textarea  name="prooduct_description" rows="4" cols="50" required=""></textarea>
				</p>
                <p style='font-size: 20px;'>Product Unit :
					<input type="text" name="unit" placeholder="Product Unit (kg/L/pc)" required>
				    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Perchase Price/Unite :
					<input type="text" name="price_per_unite" placeholder="Price/Unite in USD">
				</p>

					<input id="button" type="submit" value="Insert">
			</div>
		</form>
	</body>
</html>