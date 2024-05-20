<?php
 
include_once 'database.php';

session_start();

  if(isset($_SESSION['fld_staff_num']) && isset($_SESSION['fld_staff_email'])) {
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
//Create
if (isset($_POST['create'])) {

  if (isset($_SESSION['fld_userlevel']) && $_SESSION['fld_userlevel'] =='Admin') {
 
  try {
 
    $stmt = $conn->prepare("INSERT INTO tbl_staffs_a182427_pt2(fld_staff_num, fld_staff_name,
      fld_staff_gender, fld_staff_phone, fld_staff_email, fld_password, fld_userlevel, fld_staff_register) VALUES(:sid, :name, :gender,
      :phone, :email, :password, :userlevel, :register)");
   
    $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
    $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':password', $passwd, PDO::PARAM_STR);
    $stmt->bindParam(':userlevel', $userlevel, PDO::PARAM_STR);
    $stmt->bindParam(':register', $register, PDO::PARAM_STR);
       
    $sid = $_POST['sid'];
    $name = $_POST['name'];
    $gender =  $_POST['gender'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $passwd = $_POST['password'];
    $userlevel = $_POST['userlevel'];
    $register = $_POST['register'];
         
    $stmt->execute();
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}else{

  //echo "Error: Only authorized user can create new customer. ";
  $alert = "<script> alert(' Only authorized user can create new staff.');</script>";
  echo $alert;

}

}
 
//Update
if (isset($_POST['update'])) {
  if (isset($_SESSION['fld_userlevel']) && $_SESSION['fld_userlevel'] =='Admin') {
   
  try {
 
    $stmt = $conn->prepare("UPDATE tbl_staffs_a182427_pt2 SET
      fld_staff_num = :sid, fld_staff_name = :name, fld_staff_gender = :gender,
      fld_staff_phone = :phone, fld_staff_email = :email, fld_password =:password,fld_userlevel= :userlevel, fld_staff_register = :register
      WHERE fld_staff_num = :oldsid");
   
    $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
    $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
     $stmt->bindParam(':password', $passwd, PDO::PARAM_STR);
    $stmt->bindParam(':userlevel', $userlevel, PDO::PARAM_STR);
    $stmt->bindParam(':register', $register, PDO::PARAM_STR);
    $stmt->bindParam(':oldsid', $oldsid, PDO::PARAM_STR);
       
    $sid = $_POST['sid'];
    $name = $_POST['name'];
    $gender =  $_POST['gender'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $passwd = $_POST['password'];
    $userlevel = $_POST['userlevel'];
    $register = $_POST['register'];
    $oldsid = $_POST['oldsid'];
         
    $stmt->execute();
 
    header("Location: staffs.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}else{

  //echo "Error: Only authorized user can create new customer. ";
  $alert = "<script> alert(' Only authorized user can update staff detail.');</script>";
  echo $alert;

}
}
 
//Delete
if (isset($_GET['delete'])) {
  if (isset($_SESSION['fld_userlevel']) && $_SESSION['fld_userlevel'] =='Admin') {
 
  try {
 
    $stmt = $conn->prepare("DELETE FROM tbl_staffs_a182427_pt2 where fld_staff_num = :sid");
   
    $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
       
    $sid = $_GET['delete'];
     
    $stmt->execute();
 
    header("Location: staffs.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}else{

  //echo "Error: Only authorized user can create new customer. ";
  $alert = "<script> alert(' Only authorized user can delete staff detail.');</script>";
  echo $alert;

}

}
 
//Edit
if (isset($_GET['edit'])) {

  
   
  try {
 
    $stmt = $conn->prepare("SELECT * FROM tbl_staffs_a182427_pt2 where fld_staff_num = :sid");
   
    $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
       
    $sid = $_GET['edit'];
     
    $stmt->execute();
 
    $editrow = $stmt->fetch(PDO::FETCH_ASSOC);
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
  $conn = null;
}else
{
    header("Location: index.php");
    exit();
}  
 
?>