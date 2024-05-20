<?php

session_start();

include "database.php";

if (isset($_POST['uname'])&& isset($_POST['password'])){
 
    function validate($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }
    $uname=validate($_POST['uname']);
    $pass=validate($_POST['password']);

    if(empty($uname)){
         header("Location: index.php?error=Username is required");
         exit();
    }else if(empty($pass)){
        header("Location: index.php?error=Password is required");
         exit();
    }else{
      $sql="SELECT * FROM tbl_staffs_a182427_pt2 WHERE fld_staff_email='$uname' AND fld_password='$pass'";
      $result = mysqli_query($conn,$sql);

      if(mysqli_num_rows($result)===1){
        $row=mysqli_fetch_assoc($result);
        if($row['fld_staff_email']===$uname && $row['fld_password']===$pass){
            $_SESSION['fld_staff_email']=$row['fld_staff_email'];
             $_SESSION['fld_staff_num']=$row['fld_staff_num'];
             $_SESSION['fld_staff_name']=$row['fld_staff_name'];
             $_SESSION['fld_staff_phone']=$row['fld_staff_phone'];
             $_SESSION['fld_userlevel']=$row['fld_userlevel'];
             header("Location: mainmenu.php");
             exit();
        }else{
          header("Location: index.php?error=Incorrect Email or Password");
            exit();
        }
      }
      else{
        header("Location: index.php?error=Incorrect Email or Password");
         exit();
      }
    }

}else{
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>GALAXY GAMES : Home</title>
   <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
      html {
        width:100%;
        height:100%;
        background:url(logo1.png) center center no-repeat;
        min-height:100%;
      }
    </style>
</head>
<body background ="bg8.png"><br>

    <h1>Hello, <?php echo $_SESSION['fld_staff_name'];?></h1>
  
  <?php include_once 'nav_bar.php'; ?>
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
