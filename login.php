<?php 

include_once 'config.php';

$conf = new config();

if ( $conf->SessionCheck() ){
	header( "location:index2.php" );
	}
if ( isset( $_POST[ 'login_user' ] ) ) {
$username = $_POST[ 'Username' ];
$password = $_POST[ 'Parola' ];
$user = $conf->user_Login( $username, $password );
	if($user==0){
		$error =  'Invalid Username/Publisher ID or Password';
		}
}
$page_title = "Login";
?>
<style>
body {
    
   
    background: url(img/bg.PNG) !important;
    background-size: cover !important;
}
form{
    width:52% !important;
    margin-left:215px !important
}
</style>
<!DOCTYPE html>
<html>
<head>
  <title>Autentificare</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="">
<div style="float: left;width:50%">
  <div class="header" style="width: 52%;margin-left:215px">
  	<h2>Autentificare</h2>
  </div>
	
  <form method="POST" action="">
  <?php include('messages-display.php') ?>
  	<div class="input-group">
  		<label>Nume utilizator</label>
  		<input type="text" name="Username" >
  	</div>
  	<div class="input-group">
  		<label>Parola</label>
  		<input type="password" name="Parola">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Autentificare</button>
  	</div>
  	<p>
  		Nu sunteti membru? <a href="register.php">Inregistrare</a>
  	</p>
  </form>
    </div>
  <div style="float: right;">
  <img src="img/mobile.png" style="width: 58%;
    margin-top: 40px;">
  
  </div>
 
</body>
</html>
















