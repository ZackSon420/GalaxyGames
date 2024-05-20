<?php
  include_once 'database.php';
  if(isset($_SESSION['fld_staff_num']) && isset($_SESSION['fld_staff_email'])) {
?>
<?php
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM tbl_orders_a182427_pt2, tbl_staffs_a182427_pt2,
      tbl_customers_a182427_pt2, tbl_orders_details_a182427_pt2 WHERE
      tbl_orders_a182427_pt2.fld_staff_num = tbl_staffs_a182427_pt2.fld_staff_num AND
      tbl_orders_a182427_pt2.fld_customer_num = tbl_customers_a182427_pt2.fld_customer_num AND
      tbl_orders_a182427_pt2.fld_order_num = tbl_orders_details_a182427_pt2.fld_order_num AND
      tbl_orders_a182427_pt2.fld_order_num = :oid");
  $stmt->bindParam(':oid', $oid, PDO::PARAM_STR);
    $oid = $_GET['oid'];
  $stmt->execute();
  $readrow = $stmt->fetch(PDO::FETCH_ASSOC);
  }
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>
 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Invoice</title>
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
                html,body {
                  
                  background:url(inv.jpg);
                  ;
                }
                tbl{
                  
                  border:2px solid black;
                }
            </style> 
</head>
<body>
 
<div class="row">
<div class="col-xs-6 text-left" >
  <br>
    <img src="logo1.png" width="25%" height="25%" style="padding: 10px ">
</div>
<div class="col-xs-6 text-right">
  <h1>INVOICE</h1>
  <h5>Order: <?php echo $readrow['fld_order_num'] ?></h5>
  <h5>Date: <?php echo $readrow['fld_order_date'] ?></h5>
</div>
</div>
<hr>
<div class="row">
  <div class="col-xs-5">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4>From: GALAXY GAMES Sdn. Bhd.</h4>
      </div>
      <div class="panel-body">
        <p>
        Jalan SS5c/14,Kelana Jaya <br>
        43650, Selangor <br>
        </p>
      </div>
    </div>
  </div>
    <div class="col-xs-5 col-xs-offset-2 text-right">
        <div class="panel panel-default">
            <div class="panel-heading">
              <h4>To : <?php echo $readrow['fld_customer_name'] ?></h4>
            </div>
            <div class="panel-body">
        <p>
        <?php echo $readrow['fld_customer_address'] ?>
        </p>
            </div>
        </div>
    </div>
</div>
 
<table class="tbl table table-bordered" >
  <tr >
    <th>No</th>
    <th>Product</th>
    <th class="text-right">Quantity</th>
    <th class="text-right">Price(RM)/Unit</th>
    <th class="text-right">Total(RM)</th>
  </tr>
  <?php
  $grandtotal = 0;
  $counter = 1;
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $conn->prepare("SELECT * FROM tbl_orders_details_a182427_pt2,
        tbl_products_a182427_pt2 where 
        tbl_orders_details_a182427_pt2.fld_product_num = tbl_products_a182427_pt2.fld_product_num AND
        fld_order_num = :oid");
    $stmt->bindParam(':oid', $oid, PDO::PARAM_STR);
      $oid = $_GET['oid'];
    $stmt->execute();
    $result = $stmt->fetchAll();
  }
  catch(PDOException $e){
        echo "Error: " . $e->getMessage();
  }
  foreach($result as $detailrow) {
  ?>
  <tr>
    <td><?php echo $counter; ?></td>
    <td><?php echo $detailrow['fld_product_name']; ?></td>
    <td class="text-right"><?php echo $detailrow['fld_order_detail_quantity']; ?></td>
    <td class="text-right"><?php echo $detailrow['fld_product_price']; ?></td>
    <td class="text-right"><?php echo $detailrow['fld_product_price']*$detailrow['fld_order_detail_quantity']; ?></td>
  </tr>
  <?php
    $grandtotal = $grandtotal + $detailrow['fld_product_price']*$detailrow['fld_order_detail_quantity'];
    $counter++;
  } // while
  ?>
  <tr>
    <td colspan="4" class="text-right">Grand Total</td>
    <td class="text-right"><?php echo $grandtotal ?></td>
  </tr>
</table>
 
<div class="row">
  <div class="col-xs-5">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4>Bank Details</h4>
      </div>
      <div class="panel-body">
        <p>GALAXY GAMES</p>
        <p>MAYBANK BERHAD</p>
        <p>Account Number : 1625783654</p>
      </div>
    </div>
    </div>
  <div class="col-xs-7">
    <div class="span7">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4>Contact Details</h4>
        </div>
        <div class="panel-body">
          <p> Staff: <?php echo $readrow['fld_staff_name'] ?> </p>
          
          <p><br></p>       
          <p><br></p>
          <p>Computer-generated invoice. No signature is required.</p>
        </div>
      </div>
    </div>
  </div>
</div>
 
</body>
</html>
<?php

}else
{
    header("Location: index.php");
    exit();
}
?>