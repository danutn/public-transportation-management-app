<?php 

include_once 'config.php';

$conf = new config();
if ( $conf->SessionCheck() ){
	header( "location:index2.php" );
	}
$page = 'register.php';

if ( isset( $_POST[ 'reg_user' ] ) ) {
	$error = "";


	$username= $_POST[ 'Username' ];

	$surname = $_POST[ 'Nume_prenume' ];

    $password = $_POST[ 'Parola' ];
    $password1 = $_POST[ 'Parola1' ];
  
	if ( empty( $username ) ) {
		$error = "Please enter username";
	}
    if ( empty( $surname ) ) {
		$error = "Please enter Surname";
	}
	if($password!=$password1)
    {
      	$error = "Eroare de inregistrare! Cele doua parole nu corespund!"; 
    }
	
     $img_var = $_FILES[ "Avatar" ][ "name" ];

    
		if($conf->user_reg_ch_username($username)==false){
		$error = 'This Username '.$username.' already exist.';
		}
     

	if ( empty( $error ) ) {
	   
        
       
       
       if(empty($img_var))
       {
		$data_post = array(  'Username' => $username,  'Nume_prenume' => $surname, 'Parola'=>md5($password), 'tip_user'=>'user');
		$recodes = $conf->insert( $data_post, users );
        }
        else {
            $img_var_check = $conf->image_upload_check( 'Avatar' );
			if ( $img_var_check != "OK" ) {
				$error = $img_var_check;
			} 
        else{
        $data_post = array(  'Username' => $username,  'Nume_prenume' => $surname, 'Parola'=>md5($password), 'tip_user'=>'user');
		$recodes = $conf->insert( $data_post, users );
        $img = preg_replace( "/[^a-z0-9._]/", "", str_replace( " ", "-", str_replace( "%20", "-", strtolower( $img_var ) ) ) );
				$filename = "had" . $recodes . "-" . $img;
				$savefile = 'userAvater/' . $filename;

				if ( move_uploaded_file( $_FILES[ 'Avatar' ][ 'tmp_name' ], $savefile ) ) {
					$table = users . " set `avater`='" . $filename . "' where id_Users='" . $recodes . "'";
					$conf->updateValue( $table );

				}
        
        } }
        
		if ( $recodes == true ) {
		 	$success = "User  <strong>Registerd </strong> Successfully.<br>Welcome ".$username;
            $_SESSION[ 'login' ] = true;

			$_SESSION[ 'reg_id' ] = $recodes;

			$_SESSION[ 'Username' ] = $username;
             $_SESSION[ 'avater' ] = $filename;
			$conf->RedirectUser();
            
		}
	} 
    //}
}
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
  <title>Inregistrare</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div style="float: left;width:50%">
  <div class="header" style="width: 52%;margin-left:215px">
  	<h2>Inregistrare</h2>
  </div>
	 

  <form method="post" action="" enctype="multipart/form-data">
  	<?php include('messages-display.php') ?>
  	<div class="input-group">
  	  <label>Nume utilizator</label>
  	  <input type="text" name="Username" required="" value="<?=$username?>">
  	</div>
  	<div class="input-group">
  	  <label>Nume si Prenume</label>
  	  <input type="text" name="Nume_prenume" required="" value="<?=$surname?>">
  	</div>
  	<div class="input-group">
  	  <label>Parola</label>
  	  <input type="password" name="Parola" required="" value="<?=$password?>">
  	</div>
  	<div class="input-group">
  	  <label>Confirmare parola</label>
  	  <input type="password" name="Parola1" required="" value="<?=$password1?>">
  	</div>
    
    <div class="input-group">
  	  <label>Avatar</label>
  	  <input type="file" name="Avatar"  >
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Inregistrare</button>
  	</div>
  	<p>
  		Sunteti membru deja? <a href="login.php">Autentificare</a>
  	</p>
  </form>
  
  </div>
  <div style="float: right;">
  <img src="img/mobile.png" style="width: 58%;
    margin-top: 40px;">
  
  </div>
	
</body>
</html>

