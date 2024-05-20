<?php
  include_once 'staffs_crud.php';
  //session_start();
  if (isset($_SESSION['fld_userlevel']) && $_SESSION['fld_userlevel'] =='Normal Staff') {
         header("Location: mainmenu.php");
         exit();

    }


  if(isset($_SESSION['fld_staff_num']) && isset($_SESSION['fld_staff_email'])) {
?>




<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
 
  <title>Galaxy Games Ordering System : Staffs</title>
   <!-- Bootstrap -->
   
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="style3.css" rel="stylesheet">
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
  height: 225%;
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
    <br>
    <br>
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3"  style="border-radius: 15px;background-color: white;" >
      <div class="page-header">
        <h2>Create New Staff</h2>
      </div>

    <form action="staffs.php" method="post" class="form-horizontal">
       <div class="form-group">
          <label for="staffid" class="col-sm-3 control-label">Staff ID</label>
          <div class="col-sm-9">
     <input name="sid" type="text" class="form-control" id="staffid" placeholder="Staff ID" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_num']; ?>" required>
 
 
 
       </div>
        </div>
      <div class="form-group">
          <label for="stafffname" class="col-sm-3 control-label">Name</label>
          <div class="col-sm-9">
     <input name="name" type="text" class="form-control" id="name" placeholder="Name" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_name']; ?>" required>
 
 
  
       </div>
        </div>

        <div class="form-group">
          <label for="staffgender" class="col-sm-3 control-label">Gender</label>
          <div class="col-sm-9">
          <div class="radio">
            <label>
     <input name="gender" type="radio" value="Male" id="staffgender"<?php if(isset($_GET['edit'])) if($editrow['fld_staff_gender']=="Male") echo "checked"; ?>> Male
 
            </label>
          </div>
          <div class="radio">
              <label>
                <input name="gender" type="radio" value="Female" id="staffgender" <?php if(isset($_GET['edit'])) if($editrow['fld_staff_gender']=="Female") echo "checked"; ?>> Female
 
      </label>
            </div>
            
          


          </div>
      </div>

        <div class="form-group">
          <label for="phonenum" class="col-sm-3 control-label">Phone Number</label>
          <div class="col-sm-9">
      <input name="phone" type="text" class="form-control" id="phonenum" placeholder="+60##-#######" pattern="\+60\d{2}-\d{7}" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_phone']; ?>"  required>
 
        </div>
        </div>

        <div class="form-group">
          <label for="staffemail" class="col-sm-3 control-label">Email Address</label>
          <div class="col-sm-9">
      <input name="email" type="email" class="form-control" id="staffemail" placeholder="Email Address" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_email']; ?>"  required>
 
        </div>
        </div>

        <div class="form-group">
      <label for="password" class="col-sm-3 control-label">Password</label>
      <div class="col-sm-9">
      <input name="password" type="password" class="form-control" id="password" placeholder="Password" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_password']; ?>" required>
      </div>
      </div>  

      <div class="form-group">
      <label for="userlevel" class="col-sm-3 control-label">User Level</label>
      <div class="col-sm-9">
      <div class="radio">
      <label>
      <input name="userlevel" type="radio" id="userlevel" value="Normal Staff" <?php if(isset($_GET['edit'])) if($editrow['fld_userlevel']=="Normal Staff") echo "checked"; ?> required> Normal Staff
        </label>
          </div>
          <div class="radio">
            <label>
        <input name="userlevel" type="radio" id="userlevel" value="Admin" <?php if(isset($_GET['edit'])) if($editrow['fld_userlevel']=="Admin") echo "checked"; ?>> Admin 
        </label>
        </div>
        </div>
      </div>


        <div class="form-group">
          <label for="staffregister" class="col-sm-3 control-label">Register</label>
          <div class="col-sm-9">
      <input type="date" name="register" class="form-control" id="staffregister" value="<?php  if(isset($_GET['edit'])) echo $editrow['fld_staff_register']; ?>" required>
 
        </div>
        </div>
      <br>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9 inputfield btn-group">
  <?php if (isset($_GET['edit'])) { ?>
      <input type="hidden" name="oldsid" value="<?php echo $editrow['fld_staff_num']; ?>">
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
</div>

    <div class="row">
    <div class=" col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <div class="page-header" style="color: white" style="border-radius: 15px;">
        <h2>Staff List</h2>
      </div>
      <table id="example" class="table table-striped table-bordered">
    
      <thead>
      <tr>
          <th>Staff ID</th>
          <th>Name</th>
          <th>Phone Number</th>
          <th>Email Address</th>
          <th>Password</th>
          <th>User Level</th>
          <th>Register Date</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
     <?php
      // Read
      
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("select * from tbl_staffs_a182427_pt2");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?>
      
      <tr>
        <td><?php echo $readrow['fld_staff_num']; ?></td>
        <td><?php echo $readrow['fld_staff_name']; ?></td>
        
        <td><?php echo $readrow['fld_staff_phone']; ?></td>
        <td><?php echo $readrow['fld_staff_email']; ?></td>
        <td><?php echo $readrow['fld_password']; ?></td>
         <td><?php echo $readrow['fld_userlevel']; ?></td>
        <td><?php echo $readrow['fld_staff_register']; ?></td>
        <td>
          <?php
           if (isset($_SESSION['fld_userlevel']) && $_SESSION['fld_userlevel'] =='Admin'){
            ?>
          <a style="margin:2px;" href="staffs.php?edit=<?php echo $readrow['fld_staff_num']; ?>" class="btn btn-success btn-xs" role="button"> Edit </a>
          <a href="staffs.php?delete=<?php echo $readrow['fld_staff_num']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
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


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
    $('#example').DataTable({
      "aLengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
    "pageLength": 5
    }
      );
    


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