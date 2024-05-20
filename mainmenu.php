<?php

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

    <link href="styles2.css" rel="stylesheet">
  <div style="background-color:#0B2643" class="container-fluid bg-success text-center">
	<title>GALAXY GAMES : Home</title>
	 <!-- Bootstrap -->

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
 
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
        background:url(logo.png) center center no-repeat;
        min-height:100%;
        
        
      }

      body{

        
        
      }
      li {
      width: auto;
    }
    .social {
    position: absolute;
    z-index: 10;
    bottom: 175px;
    right: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.social li {
    list-style: none;
}

.social li a {
    display: inline-block;
    margin-right: 20px;
    filter: invert(1);
    transform: scale(0.5);
    transition: 0.5s;
}

.social li a:hover {
    transform: scale(0.5) translateY(-15px);
    text-decoration: none;
}
.text {
     position: absolute;
    z-index: 10;
    bottom: 20px;
}

.text h2 {
    font-size: 5em;
    font-weight: 800;
    color: #fff;
    line-height: 1em;
    text-transform: uppercase;
}

.text h3 {
    font-size: 4em;
    font-weight: 700;
    color: #fff;
    line-height: 1em;
    text-transform: uppercase;
}

.text p {
    font-size: 1.1em;
    color: #fff;
    margin: 20px 0;
    font-weight: 400;
    max-width: 700px;
}

.text a {
    display: inline-block;
    font-size: 1em;
    background: #fff;
    padding: 10px 30px;
    text-transform: uppercase;
    text-decoration: none;
    font-weight: 500;
    margin-top: 10px;
    color: #111;
    letter-spacing: 2px;
    transition: 0.2s;
}

.text a:hover {
    letter-spacing: 6px;
}
.testing {
    right: 0;
    width: 100%;
    min-height: 100vh;
}
.showcase {
    position: absolute;
    right: 0;
    width: 100%;
    min-height: 100vh;
    padding: 100px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #111;
    transition: 0.5s;
    z-index: 2;
    background-image: url("bg5.png");
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
}
.toggle {
    position: relative;
    width: 60px;
    height: 60px;
    background: url(https://i.ibb.co/HrfVRcx/menu.png);
    background-repeat: no-repeat;
    background-size: 30px;
    background-position: center;
    cursor: pointer;
}

.toggle.active {
    background: url(https://i.ibb.co/rt3HybH/close.png);
    background-repeat: no-repeat;
    background-size: 25px;
    background-position: center;
    cursor: pointer;
}
.partner {
    position: absolute;
    z-index: 10;
    bottom: 175px;
    right: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.partner li {
    list-style: none;
     display: inline-block;
    margin-right: 20px;
    filter: invert(1);
    transform: scale(0.5);
    transition: 0.5s;
}


    </style>
</head>
<body>
    
	
	<?php include_once 'nav_bar3.php'; ?>

  <div class="testing">
    <section class="showcase">
      
      
      <div class="overlay"></div>
      <div class="text">
        <h2>Gaming Made Easy </h2>
        <h3>Console Experts</h3>

      </div>
      <ul class="social">
        <li>
          <a href="https://www.facebook.com/" target="_blank"><img
              src="https://i.ibb.co/x7P24fL/facebook.png"></a>
        </li>
        <li>
          <a href="https://www.twitter.com/" target="_blank"><img
              src="https://i.ibb.co/Wnxq2Nq/twitter.png"></a>
        </li>
        <li>
          <a href="https://www.instagram.com/" target="_blank"><img
              src="https://i.ibb.co/ySwtH4B/instagram.png"></a>
        </li>

      </ul>

      

    </section>
  </div>
	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php

}else
{
    header("Location: index.php");
    exit();
}
?>