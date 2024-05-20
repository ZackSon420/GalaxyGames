<?php
  include_once 'products_crud.php';
  session_start();

  if(isset($_SESSION['fld_staff_num']) && isset($_SESSION['fld_staff_email'])) {
?>




<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>GALAXY GAMES Ordering System : Products</title>
  <!-- Bootstrap -->
  <link href="style3.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap.min.css">
  <style>
      #tbl-search_filter label {
    color: white;
}

#tbl-search_info {
    padding-top: 20px;
    color: white;
}

body, html {
  height: 300%;
  width: 100%;
}
.dataTables_filter label {
  color: white;
  
}

    </style>
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body style="background-color: #eaa221;
        background-image: url(psn2.jpg) ; background-position: center;
        height:100%;width:100%;
        background-size: cover;">
    <?php include_once 'nav_bar3.php'; ?>
 
<div class="container-fluid">
  <div class="row">
    <div class="col col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3"  style="border-radius: 15px;">
      <div class="page-header">
        <h2>Create New Product</h2>
      </div>
 
    
    
    <form action="products.php" method="post" class="form-horizontal">
       <div class="form-group">
          <label for="productid" class="col-sm-3 control-label">ID</label>
          <div class="col-sm-9">
       <input name="pid" type="text" class="form-control" id="productid" placeholder="Product ID" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_num']; ?>" required>
 
 
       </div>
        </div>
      <div class="form-group">
          <label for="productname" class="col-sm-3 control-label">Name</label>
          <div class="col-sm-9">
       <input name="name" type="text" class="form-control" id="productname" placeholder="Product Name" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_name']; ?>" required>
 
      </div>
        </div>
        <div class="form-group">
          <label for="productprice" class="col-sm-3 control-label">Price</label>
          <div class="col-sm-9">
       <input name="price" type="number" class="form-control" id="productprice" placeholder="Product Price" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_price']; ?>" min="0.0" step="0.01" required>
 
      </div>
        </div>
          
        <div class="form-group">
          <label for="productcond" class="col-sm-3 control-label">Console</label>
          <div class="col-sm-9">
          <div class="radio">
            <label>
     <input name="console" type="radio" value="PSP" id="productcons" <?php if(isset($_GET['edit'])) if($editrow['fld_product_console']=="PSP") echo "checked"; ?> required> PSP
 
            </label>
          </div>
          <div class="radio">
              <label>
                <input name="console" type="radio" value="PSV" id="productcons"<?php if(isset($_GET['edit'])) if($editrow['fld_product_console']=="PSV") echo "checked"; ?>> PSV
 
      </label>
            </div>
            <div class="radio">
            <label>
     <input name="console" type="radio" value="3DS" id="productcons"<?php if(isset($_GET['edit'])) if($editrow['fld_product_console']=="3DS") echo "checked"; ?>> 3DS
 
            </label>
          </div>
          <div class="radio">
            <label>
     <input name="console" type="radio" value="NS" id="productcons"<?php if(isset($_GET['edit'])) if($editrow['fld_product_console']=="NS") echo "checked"; ?>> NS
 
            </label>
          </div>


          </div>
      </div>
        <div class="form-group">
          <label for="productgenre" class="col-sm-3 control-label">Genre</label>
          <div class="col-sm-9">
      <select name="genre" class="form-control" id="productgenre" required>
            <option value="">Please select</option>
            <option value="Action-Adventure" <?php if(isset($_GET['edit'])) if($editrow['fld_product_genre']=="Action-Adventure") echo "selected"; ?>>Action-Adventure</option>
            <option value="Action" <?php if(isset($_GET['edit'])) if($editrow['fld_product_genre']=="Action") echo "selected"; ?>>Action</option>
        <option value="Adventure" <?php if(isset($_GET['edit'])) if($editrow['fld_product_genre']=="Adventure") echo "selected"; ?>>Adventure</option>
        <option value="Fighting" <?php if(isset($_GET['edit'])) if($editrow['fld_product_genre']=="Fighting") echo "selected"; ?>>Fighting</option>
        <option value="First-Person-Shooter" <?php if(isset($_GET['edit'])) if($editrow['fld_product_genre']=="First-Person Shooter") echo "selected"; ?>>First-Person Shooter</option>
        <option value="Racing" <?php if(isset($_GET['edit'])) if($editrow['fld_product_genre']=="Racing") echo "selected"; ?>>Racing</option>
        <option value="Role-Playing" <?php if(isset($_GET['edit'])) if($editrow['fld_product_genre']=="Role-Playing") echo "selected"; ?>>Role-Playing</option>
        <option value="Simulation" <?php if(isset($_GET['edit'])) if($editrow['fld_product_genre']=="Simulation") echo "selected"; ?>>Simulation</option>
        <option value="Sports" <?php if(isset($_GET['edit'])) if($editrow['fld_product_genre']=="Sports") echo "selected"; ?>>Sports</option>
          </select>
      
      </div>
        </div>

        <div class="form-group">
          <label for="producttype" class="col-sm-3 control-label">Game Type</label>
          <div class="col-sm-9">
      <select name="type" class="form-control" id="producttype" required>
            <option value="">Please select</option>
            <option value="singleplayer" <?php if(isset($_GET['edit'])) if($editrow['fld_product_game_type']=="singleplayer") echo "selected"; ?>>Singleplayer</option>
            <option value="multi" <?php if(isset($_GET['edit'])) if($editrow['fld_product_game_type']=="multiplayer") echo "selected"; ?>>Multiplayer</option>
        <option value="singleplayer & multiplayer" <?php if(isset($_GET['edit'])) if($editrow['fld_product_game_type']=="singleplayer & multiplayer") echo "selected"; ?>>Singleplayer & Multiplayer</option>
        
          </select>
      
      </div>
        </div>



      


      <div class="form-group">
          <label for="productdesc" class="col-sm-3 control-label">Description</label>
          <div class="col-sm-9">
      <input name="description" type="text" class="form-control" id="productdesc" placeholder="Product Description" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_description']; ?>"  min="0" required>
 
        </div>
        </div>

        <div class="form-group">
          <label for="productq" class="col-sm-3 control-label">Quantity</label>
          <div class="col-sm-9">
    <input name="quantity" type="number" class="form-control" id="productq" placeholder="Product Quantity" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_quantity']; ?>"  min="0" required>
 
  

       </div>
        </div>
        <div class="form-group">
          <label for="productrelease" class="col-sm-3 control-label">Release Date</label>
          <div class="col-sm-9">
      <input type="date" name="r_date" class="form-control" id="productrelease" value="<?php  if(isset($_GET['edit'])) echo $editrow['fld_product_release_date']; ?>">

      <br>
 
        </div>
        </div>  

        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9 inputfield btn-group">
      <?php if (isset($_GET['edit'])) { ?>
      <input type="hidden" name="oldpid" value="<?php echo $editrow['fld_product_num']; ?>">
      <button class="btn btn-default" type="submit" name="update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</button>
 
      <?php } else { ?>

 <?php
if (isset($_SESSION['fld_userlevel']) && $_SESSION['fld_userlevel'] =='Admin'){
?> 
      
      <button class="btn btn-default" type="submit" name="create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</button>
 
      <?php } ?> 
      <button class="btn btn-default" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Clear</button>

      <?php } ?>
      


 
   </div>
      </div>
    </form>
    </div>
  </div>
    <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2" >
      <div class="page-header" style="color: white" style="border-radius: 15px;">
        <h2>Products List</h2>
      </div>
      <table id="example" class="table table-striped table-bordered">
        <thead>
        <tr>
          <th>Product ID</th>
          <th>Name</th>
          <th>Price</th>
          <th>Console</th>
          <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
      // Read
       
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("select * from tbl_products_a182427_pt2");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?>   
      <tr>
        <td><?php echo $readrow['fld_product_num']; ?></td>
        <td><?php echo $readrow['fld_product_name']; ?></td>
        <td><?php echo $readrow['fld_product_price']; ?></td>
        <td><?php echo $readrow['fld_product_console']; ?></td>
        <td>
          
             
            <button type="button" role="button" class="btn btn-warning btn-xs modalbtn" data-toggle="modal" data-target="#myModal" data-href="products_details.php?pid=<?php echo $readrow['fld_product_num'];?>">
  Details
</button>
<?php
           if (isset($_SESSION['fld_userlevel']) && $_SESSION['fld_userlevel'] =='Admin'){
            ?>
          <a href="products.php?edit=<?php echo $readrow['fld_product_num']; ?>" class="btn btn-success btn-xs" role="button"> Edit </a>
          <a href="products.php?delete=<?php echo $readrow['fld_product_num']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
      <?php
        }
          ?>
        </td>
      </tr>
       <?php
      }
      $conn = null;

      ?>
 
 </tbody>
    </table>
     </div>
  </div>
  <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Product Details</h4>
      </div>
      <div class="modal-body">
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
    
      </div>
    </div>
  </div>
</div>
  
   
    
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
  $(document).ready(function () {
    $('#example').DataTable({
      "aLengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
    "pageLength": 5
    }
      );
    


});
</script>
    <script>
       $(document).ready(function(){
   $("body").on("click", ".modalbtn", function(event){ 
     
     var dataURL = $(this).attr( "data-href" )
     $('.modal-body').load(dataURL,function(){
      $('#myModal').modal({show:true});
      $('#myModal').on('hidden.bs.modal', function () {
       // location.reload(); 

      })
    });
   });
  });
    </script>

</body>
</html>
<?php

}else
{
    header("Location: index.php");
    exit();
}
?>