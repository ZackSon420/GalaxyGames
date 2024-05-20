<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="style4.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
          <span class="icon">
         <image src="logo1.png" width="40px" height="40px">  
         </image> 
       </span>
        <div class="logo_name">GALAXY GAMES </div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
    
      <li>
        <a href="mainmenu.php">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Home</span>
        </a>
         <span class="tooltip">Home</span>
      </li>
      <li>
       <a href="customers.php">
         <i class='bx bx-user' ></i>
         <span class="links_name">Customers</span>
       </a>
       <span class="tooltip">Customers</span>
     </li>
     <li>
       <a href="products.php">
         <i class='bx bx-shopping-bag' ></i>
         <span class="links_name">Products</span>
       </a>
       <span class="tooltip">Products</span>
     </li>
     <?php
if (isset($_SESSION['fld_userlevel']) && $_SESSION['fld_userlevel'] =='Admin'){
?> 
     <li>
       <a href="staffs.php">
         <i class='bx bx-user-circle' ></i>
         <span class="links_name">Staffs</span>
       </a>
       <span class="tooltip">Staffs</span>
     </li>
     <?php } ?>
     <li>
       <a href="orders.php">
         <i class='bx bx-cart-alt' ></i>
         <span class="links_name">Order</span>
       </a>
       <span class="tooltip">Order</span>
     </li>
     
     
     <li class="profile">
         <div class="profile-details">
           <!--<img src="profile.jpg" alt="profileImg">-->
           <div class="name_job">
             <div class="name">&nbsp<?php echo $_SESSION['fld_staff_name'];?></div>
             <div class="job">&nbsp<?php echo  $_SESSION['fld_userlevel'];?></div>
           </div>
         </div>
         <i class='bx bx-log-out' id="log_out" onClick="openCompiler()" ></i>
     </li>
    </ul>
  </div>
  
  <script>
  let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");
  let searchBtn = document.querySelector(".bx-search");

  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();//calling the function(optional)
  });

  searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
    sidebar.classList.toggle("open");
    menuBtnChange(); //calling the function(optional)
  });

  // following are the code to change sidebar button(optional)
  function menuBtnChange() {
   if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
   }else {
     closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
   }
  }
  </script>
  <script type="text/javascript">
    function openCompiler()
{
    window.location.replace("logout.php");
    
}
  </script>
</body>
</html>
