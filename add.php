<?php 
include('admin.php');
if($_SERVER['REQUEST_METHOD'] == "GET")
{
$product_id = $_GET['id'];
$sell_quantity=$_GET['xyz'];
}
if(!empty($product_id) && !empty($sell_quantity))
{
  $sql_old="SELECT quantity from product_details where product_id='$product_id'";
      $result_old=mysqli_query($con, $sql_old);
      if($result_old && mysqli_num_rows($result_old) > 0)
        {
          $data_old=mysqli_fetch_assoc($result_old);
          $quantity=$data_old['quantity'];
        }
  if($quantity>=$sell_quantity)
  {
    $sql_check="SELECT * from sell_product where product_id='$product_id'";
    $result_check=mysqli_query($con, $sql_check);
    if($result_check && mysqli_num_rows($result_check) > 0)
      {
        header("Location:http://localhost/2018-1-60-070_project/sell_product.php");
      }
  else {
      $sql = "INSERT INTO sell_product VALUES('$sell_quantity','$product_id')";
      if (mysqli_query($con, $sql)) {
        echo "Product added successfully";
        header("Location:http://localhost/2018-1-60-070_project/sell_product.php");
      } else {
        header("Location:http://localhost/2018-1-60-070_project/sell_product.php");
      }
    }
  }
  else{
    header("Location:http://localhost/2018-1-60-070_project/sell_product.php");
  }
}
die;
?>