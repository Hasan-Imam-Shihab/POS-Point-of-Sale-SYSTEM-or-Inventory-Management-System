<?php 
include('operator.php');
if($_SERVER['REQUEST_METHOD'] == "GET")
{
$product_id = $_GET['id'];
}

$sql = "delete from sell_product where product_id= $product_id";
if (mysqli_query($con, $sql)) {
    echo "Product deleted successfully";
    header("Location:http://localhost/2018-1-60-070_project/operator_sell_product.php");
 } else {
    header("Location:http://localhost/2018-1-60-070_project/operator_sell_product.php");
 }

die;
?>