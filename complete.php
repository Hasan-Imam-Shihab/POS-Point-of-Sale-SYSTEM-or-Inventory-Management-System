<?php 
include('admin.php');
$operate=$data['username'];
date_default_timezone_set("Asia/Dhaka");
$date = date("Y.m.d");
$t_id='0';
$t_id = $_GET['t_id'];
$query = "select * from sell_product";
$result = mysqli_query($con,$query);
if($result && mysqli_num_rows($result) > 0)
    {
        while($row = $result->fetch_assoc()) {
            $product_id=$row["product_id"];
            $sell_quantity=$row["sell_quantity"];
            $price="select * from product_details where product_id=$product_id";
            $price_result = mysqli_query($con,$price);
            if($price_result && mysqli_num_rows($price_result) > 0)
                {
                    $price_data=mysqli_fetch_assoc($price_result);
                    $sell_price= $price_data['price_per_unite'];
                }
            $sql = "INSERT INTO transaction(t_id ,product_id, sell_quantity, sell_price, date,operate_by ) VALUES('$t_id','$product_id', '$sell_quantity','$sell_price', '$date','$operate')";
            if ($con->query($sql) === TRUE) {
                $sql_old="SELECT quantity from product_details where product_id='$product_id'";
                $result_old=mysqli_query($con, $sql_old);
                if($result_old && mysqli_num_rows($result_old) > 0)
                {
                    $data_old=mysqli_fetch_assoc($result_old);
                    $new_quantity=$data_old['quantity']-$sell_quantity;
                    $sql_update= "UPDATE product_details SET quantity=$new_quantity WHERE product_id=$product_id";
                    if ($con->query($sql_update) === TRUE) {
                        echo "Product added successfully";
                    } else {
                        echo "Error adding product";
                    }
                }
            } else {
                echo "Error adding product";
            }
        }
        $sq="DELETE FROM sell_product";
        mysqli_query($con, $sq);
        header("Location:http://localhost/2018-1-60-070_project/sell_product.php");
    }
else{
    header("Location:http://localhost/2018-1-60-070_project/sell_product.php"); 
}


die;
?>