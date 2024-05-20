<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>GALAXY GAMES: Login Form</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
    <header>
        <div class="card">
            <form action="login.php" method="post">
            <h3>GALAXY GAMES</h3>
            <?php if (isset($_GET['error'])) {?>
            <center><p class="error"><?php echo $_GET['error']; ?></p></center>
        <?php } ?>
            <div class="form-group">
                <i class="fas fa-user"></i>
                <label for="name">Email</label>
                <input name="uname" type="text" required>
            </div>
            <div class="form-group">
                <i class="fas fa-lock"></i>
                <label for="name">Password</label>
                <input name="password" type="password" required>
            </div>
            <button class="btn" type="submit">Login</button>
            </form>
           <center> <a onClick="openCompiler()" >Demo Account</a></center>
        </div>
    </header>
    <script type="text/javascript">
    function openCompiler()
{
     alert("Email: ahmad@gmail.com\nPass: admin\n\nEmail: Iskandar@gmail.com\nPass: staff");
}
  </script>
</body>
</html>