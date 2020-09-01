<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: Login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PoliDynamics</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="icon" href="/PoliDynamics/style/image/IconoPoli.png" />
    <link rel="stylesheet" href="style/PerfilAdministrador.css" type="text/css" >
</head>
<body>

  <section id="sidebar"> 
    <?php include("templates/MenuAdministrador.php");?>
  </section>
  <section id="content">
    <?php include("templates/NavAdministrador.php");?>
    
  <div class="content">
    
  </div>
</section>

</body>
</html>