<?php
include('operator.php');
$operate=$data['username'];
date_default_timezone_set("Asia/Dhaka");
$date = date("Y.m.d");
$product_id = $_GET['p_id'];
if(!empty($product_id))
{
    $quantity=0;
    $price_per_unite=0;
    $query = "select * from product_name where id=$product_id";
    $result1 = mysqli_query($con,$query);
    if($result1 && mysqli_num_rows($result1) > 0)
        {
            $data_name=mysqli_fetch_assoc($result1);

        }
    $query1 = "select * from product_details where product_id=$product_id";
    $result2 = mysqli_query($con,$query1);
    if($result2 && mysqli_num_rows($result2) > 0)
        {
            $data_details=mysqli_fetch_assoc($result2);
    
        }
        $price = "select * from purchase_price where product_id=$product_id";
        $price_result = mysqli_query($con,$price);
        if($price_result && mysqli_num_rows($price_result) > 0)
            {
                $price_data=mysqli_fetch_assoc($price_result);
                $p_price=$price_data['purchase_price'];
    
            }
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $tp_id='20200001';
        $p_quantity=$_POST['p_quantity'];
        $trid="SELECT MAX(tp_id) as old_id FROM purchase_transaction";
        $rtrid=mysqli_query($con, $trid);
        if($rtrid && mysqli_num_rows($rtrid) > 0)
            {
                $tid_data=mysqli_fetch_assoc($rtrid);
                $tp_id=$tid_data['old_id']+1;
            }            
        if(!empty($p_quantity))
            {
                $sql = "INSERT INTO purchase_transaction (tp_id,product_id,dates,p_quantity,p_price,purchase_by) VALUES('$tp_id','$product_id', '$date', '$p_quantity','$p_price','$operate')";
                if ($con->query($sql) === TRUE)
                {
                    $p_quantity=$p_quantity+$data_details['quantity'];
                    $sql4 = "UPDATE product_details SET quantity='$p_quantity' where product_id=$product_id";
		            if(mysqli_query($con, $sql4))
                    {
                        echo"<script type='text/javascript'> 
                        alert('Update Sucessful') 
                        </script>";
                        header("Location: http://localhost/2018-1-60-070_project/operator_purchase_product.php/?p_id=$product_id");
                        die;
                    }
                }
                


            }                 
                            
    }
}
?>
<html>
	<head>
		<title>Product Management</title>
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
				<p style='font-size: 40px;'>Purchase Product</p>
                <p style='font-size: 20px;'>Product Name :<?php echo $data_name['product_name']; ?>
				    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Quantity Available:<?php echo $data_details['quantity']; ?>
				</p>
                <p style='font-size: 20px;'>Product Description :<?php echo $data_details['prooduct_description']; ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Product Unit :<?php echo $data_details['unit']; ?>
				</p>
                <p style='font-size: 20px;'> Insert Quantity You Want to Purchase:
					<input type="number" name="p_quantity" placeholder="Purchase quantity">
				</p>

					<input id="button" type="submit" value="Purchase">
                    <a href="http://localhost/2018-1-60-070_project/operator_insert_delete_product.php"><input id="button" value="         Back"></a>
			</div>
		</form>
	</body>
</html>