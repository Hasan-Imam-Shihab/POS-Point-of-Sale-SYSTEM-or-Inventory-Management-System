<?php
include('admin.php');
$product_id = $_GET['p_id'];

function recheck_data($input)
    {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }
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
if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $product_name=recheck_data($_POST['product_name']);
        $prooduct_description=recheck_data($_POST['prooduct_description']);
        $unit=recheck_data($_POST['unit']);
        $price_per_unite=recheck_data($_POST['price_per_unite']);
        $in=$data['username'];
        if(!empty($product_name))
            {
                $query4 = "UPDATE product_name SET product_name='$product_name', inserted_by='$in'  where id=$product_id";
		        mysqli_query($con, $query4);
            }
        /*if(!empty($quantity))
            {
                $quantity=$quantity+$data_details['quantity'];
                $sql4 = "UPDATE product_details SET quantity='$quantity' where product_id=$product_id";
		        mysqli_query($con, $sql4);
            }*/
        if(!empty($prooduct_description))
            {
                $sql5 = "UPDATE product_details SET prooduct_description='$prooduct_description' where product_id=$product_id";
		        mysqli_query($con, $sql5);
            }
        if(!empty($unit))
            {
                $sql6 = "UPDATE product_details SET unit='$unit' where product_id=$product_id";
		        mysqli_query($con, $sql6);
            }
        if(!empty($price_per_unite))
            {
                $s_price_per_unite=$price_per_unite+($price_per_unite*.1);
                $sql7 = "UPDATE product_details SET price_per_unite='$s_price_per_unite' where product_id=$product_id";
		        mysqli_query($con, $sql7);
                $sql8 = "UPDATE purchase_price SET purchase_price='$price_per_unite' where product_id=$product_id";
		        mysqli_query($con, $sql8);
            }
               
                            echo"<script type='text/javascript'> 
                                 alert('Update Sucessful') 
                                 </script>";                  
                            //header("Location: view_delete_operator.php");
                            //die;
    }		                    //die;
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
				<p style='font-size: 40px;'>Update Product Information</p>
                <p style='font-size: 20px;'>Product Name :
					<input type="text" name="product_name" placeholder="<?php echo $data_name['product_name']; ?>">
				    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Available Quantity : <?php echo $data_details['quantity']; ?>
				</p>
                <p style='font-size: 20px;'>Product Description :
                    <textarea  name="prooduct_description" placeholder="<?php echo $data_details['prooduct_description']; ?>"rows="2" cols="50" ></textarea>
				</p>
                <p style='font-size: 20px;'>Product Unit :
					<input type="text" name="unit" placeholder="<?php echo $data_details['unit']; ?>">
				    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Purchase Price/Unite :
					<input type="text" name="price_per_unite" placeholder="updated purchase price">
				</p>

					<input id="button" type="submit" value="UPDATE">
                    <a href="http://localhost/2018-1-60-070_project/insert_delete_product.php"><input id="button" value="         Back"></a>
			</div>
		</form>
	</body>
</html>