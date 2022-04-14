<?php
include('admin.php');
date_default_timezone_set("Asia/Dhaka");
$e_date = date("Y.m.d");
$datetime = new DateTime('today');
$datetime->modify('-30 day');
$s_date= $datetime->format('Y-m-d');
$all_total='0';
$totalp='0';
$item_name=array();
$item_quantity=array();
$item_occure=array();
$item_names=array();
$item_quantitys=array();
$item_occures=array();
$item_price=array();
$item_prices=array();

if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $s_date=$_POST['s_date'];
        $e_date=$_POST['e_date'];
        
        if(!empty($product_name) and !empty($unit))
            {
            }
    }
    echo'<div id="parent" style="top: 64%;">';
    echo'<div align="center" style="top: 75%; width: 49%; left:0%">
    <p style="font-size: 40px;">Sell Report</p>
    <p style="font-size: 20px;">From:'.$s_date.' To: '.$e_date.'<br><br><br>';;
    $query = "select DISTINCT t_id, date, operate_by from transaction where date>='$s_date' and date<='$e_date'";
    $result = mysqli_query($con,$query);
    if($result && mysqli_num_rows($result) > 0)
        {
            $all_total='0';
            $is=0;
            while($row1 = $result->fetch_assoc()) {
                echo'<table style="color: white; width:100%;" border="1">
                                <tr>
                                    <th>';
                echo'Transaction ID: '.$row1["t_id"].' <br>Date: '.$row1["date"].'<br>Operated by: '.$row1["operate_by"].'</th>';
                echo'<th><table style="color: white;  width:100%;" border="0">
                                <tr>
                                    <td>Product ID</td>
                                    <td>Product Name</td>
                                    <td>Unit Price</td>
                                    <td>Sell Quantity</td>
                                    <td>Total Price</td>
                                </tr>';
                $t_id=$row1["t_id"];
                $query_in = "select * from transaction where t_id=$t_id";
                $result_in = mysqli_query($con,$query_in);
                if($result_in && mysqli_num_rows($result_in) > 0)
                    {
                        $total='0';
                        while($row = $result_in->fetch_assoc()) {
                            $item_occures[$is]=0;
                            echo'<tr>
                                    <td> '.$row["product_id"].'</td>';
                                    $abc=$row["product_id"];
                                    $s="SELECT * from product_name where id='$abc'";
                                    $result1=mysqli_query($con, $s);
                                    if($result1 && mysqli_num_rows($result1) > 0)
                                        {
                                            $p_data=mysqli_fetch_assoc($result1);
                                        }
                                    $sq="SELECT * from product_details where product_id='$abc'";
                                    $result2=mysqli_query($con, $sq);
                                    if($result2 && mysqli_num_rows($result2) > 0)
                                        {
                                            $p_details=mysqli_fetch_assoc($result2);
                                        }
                                        $a=$row["sell_quantity"];
                                        $b=$row["sell_price"];
                                        $c=$a*$b;
                                echo'<td> '.$p_data["product_name"].'</td>
                                    <td> '.$row["sell_price"].'</td>
                                    <td> '.$row["sell_quantity"].'</td>
                                    <td> '.$c.'</td>
                                    </tr>';
                                    $ks=0;
                                    for($ks=0; $ks<$is; $ks++)
                                        {
                                            if($item_names[$ks]=== $p_data["product_name"])
                                            {
                                                $item_occures[$ks]=$item_occures[$ks]+1;
                                                break;
                                            }
                                            
                                        }



                                    if($item_occures[$ks]===0)
                                    {
                                        $item_names[$is]=$p_data["product_name"];
                                        $item_occures[$is]=1;
                                        $frequents=mysqli_query($con, "select * from transaction where product_id='$abc' and date>='$s_date' and date<='$e_date'");
                                        if($frequents && mysqli_num_rows($frequents) > 0)
                                            {
                                                $i_qs=0;
                                                $item_prices[$is]=0;
                                                while($fetchs = $frequents->fetch_assoc()) {
                                                    $i_qs=$i_qs+$fetchs['sell_quantity'];
                                                    $item_prices[$is]=$item_prices[$is]+$fetchs['sell_price']*$fetchs['sell_quantity'];
                                            
                                                }
                                                $item_quantitys[$is]=$i_qs;
                                                //$item_prices[$is]=$i_qs*$row["sell_price"];
                                            }
                                            $is++;
                                    }
                                    $total=$total+$c;
                            }
                    }
                echo'</table></th><th>Total<br>'.$total.'</th></tr>';
                echo'</table></p>';
                $all_total=$all_total+$total;
            }
        }
        echo'<p align= "center" style="font-size: 40px; color: red;">Productwise Report</p>';
        echo'<table style="color: white;  width:100%;" border="1">
                                    <tr>
                                        <td>Product Name</td>
                                        <td>Total Quantity</td>
                                        <td>Total Transaction</td>
                                        <td>Total Price</td>
                                    </tr>'; 
        for($js=0; $js<$is; $js++)
        {
            echo '<p align= "center" style="font-size: 20px;"><tr><td>'.$item_names[$js].'</td><td>'.$item_quantitys[$js].'</td><td>'.$item_occures[$js].' times occured</td><td>'.$item_prices[$js].'</td></tr></p>';
        }
        echo'</table>';
        
    echo'</div>';
        echo'<div  align="center" style="top: 75%; width: 49%; left: 50.7%;">
        <p style="font-size: 40px;">Purchase Report</p>
        <p style="font-size: 20px;">From:'.$s_date.' To: '.$e_date.'<br><br><br>';
        echo'<th><table style="color: white;  width:100%;" border="1">
                                    <tr>
                                        <td>Transaction ID</td>
                                        <td>Product ID</td>
                                        <td>Product Name</td>
                                        <td>Unit Price</td>
                                        <td>Sell Quantity</td>
                                        <td>Total Price</td>
                                    </tr>';
        $queryp = "select * from purchase_transaction where dates>='$s_date' and dates<='$e_date'";
        $resultp = mysqli_query($con,$queryp);
        if($resultp && mysqli_num_rows($resultp) > 0)
            {
                $totalp='0';
                $i=0;
                while($row1p = $resultp->fetch_assoc()) {
                                    $item_occure[$i]=0;
                                    echo'<tr>
                                        <td>Tnx id: '.$row1p["tp_id"].'<br> Purchase by:'.$row1p["purchase_by"].' </td>
                                        <td> '.$row1p["product_id"].'</td>';
                                        $abcp=$row1p["product_id"];
                                        $sp="SELECT * from product_name where id='$abcp'";
                                        $result1p=mysqli_query($con, $sp);
                                        if($result1p && mysqli_num_rows($result1p) > 0)
                                            {
                                                $p_datap=mysqli_fetch_assoc($result1p);
                                            }
                                        $sqp="SELECT * from product_details where product_id='$abcp'";
                                        $result2p=mysqli_query($con, $sqp);
                                        if($result2p && mysqli_num_rows($result2p) > 0)
                                            {
                                                $p_detailsp=mysqli_fetch_assoc($result2p);
                                            }
                                        $sqlp="SELECT * from purchase_price where product_id='$abcp'";
                                        $rp=mysqli_query($con, $sqlp);
                                        if($rp && mysqli_num_rows($rp) > 0)
                                            {
                                                $pprice=mysqli_fetch_assoc($rp);
                                            }
                                            $ap=$row1p["p_price"];
                                            $bp=$row1p["p_quantity"];
                                            $cp=$ap*$bp;
                                    echo'<td> '.$p_datap["product_name"].'</td>
                                        <td> '.$row1p["p_price"].'</td>
                                        <td> '.$row1p["p_quantity"].'</td>
                                        <td> '.$cp.'</td>
                                        </tr>';
                                        $k=0;
                                        for($k=0; $k<$i; $k++)
                                            {
                                                if($item_name[$k]=== $p_datap["product_name"])
                                                {
                                                    $item_occure[$k]=$item_occure[$k]+1;
                                                    break;
                                                }
                                                
                                            }



                                        if($item_occure[$k]===0)
                                        {
                                            $item_name[$i]=$p_datap["product_name"];
                                            $item_occure[$i]=1;
                                            $frequent=mysqli_query($con, "select * from purchase_transaction where product_id='$abcp' and dates>='$s_date' and dates<='$e_date'");
                                            if($frequent && mysqli_num_rows($frequent) > 0)
                                                {
                                                    $i_q=0;
                                                    $item_price[$i]=0;
                                                    while($fetch = $frequent->fetch_assoc()) {
                                                        $i_q=$i_q+$fetch['p_quantity'];
                                                        $item_price[$i]=$item_price[$i]+$fetch['p_price']*$fetch['p_quantity'];
                                                
                                                    }
                                                    $item_quantity[$i]=$i_q;
                                                    //$item_price[$i]=$i_q*$row1p["p_price"];
                                                }
                                                $i++;
                                        }
                                        $totalp=$totalp+$cp;
                                           
                }
            }
        echo'</table></p>';
        echo'<p align= "center" style="font-size: 40px; color: red;">Productwise Report</p>';
        echo'<table style="color: white;  width:100%;" border="1">
                                    <tr>
                                        <td>Product Name</td>
                                        <td>Total Quantity</td>
                                        <td>Total Transaction</td>
                                        <td>Total Cost</td>
                                    </tr>'; 
        for($j=0; $j<$i; $j++)
        {
            echo '<p align= "center" style="font-size: 20px;"><tr><td>'.$item_name[$j].'</td><td>'.$item_quantity[$j].'</td><td>'.$item_occure[$j].' times occured</td><td>'.$item_price[$j].'</td></tr></p>';
        }
        echo'</table>';    
        echo'</div><br><p align= "center" style="font-size: 30px;">Total Sell:'.$all_total. '   Total Purchase:'.$totalp.'<br>';
        if($all_total>$totalp)
        {
            $profit=$all_total-$totalp;
            echo 'Profit: '.$profit;
        }
        elseif($all_total<$totalp)
        {
            $loss=$totalp-$all_total;
            echo 'Loss: '.$loss;
        }
        elseif($all_total===$totalp)
        {
            echo 'Total Sell and Total Purchase are Equal';
        }
        echo'</p></div>';      
    
?>
<html>
	<head>
		<title>Generate Report</title>
        <link rel="stylesheet" href="report.css">
	</head>
	<body>
		<form method="post">
			<div align="center">
				<p style='font-size: 40px;'>Insert Date Range</p>
                <p style='font-size: 20px;'>Date From :
					<input type="date" name="s_date" required>
				    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date TO :
					<input type="date" name="e_date" required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input id="button" type="submit" value="GET REPORT"><br><br><br><br>
                    <input type="button" id="button" value="Print" onclick="myApp.printDiv()" />
                    <a href="admin_interface.php"><input id="button" value="         Back"></a><br><br>
                </p>
			</div>
		</form>
	</body>
    <script src="script.js"></script>
</html>