<?php
session_start();

$username = "";
$nume    = "";
$errors = array(); 

$db = mysqli_connect('', '', '', '');

if (isset($_POST['reg_user'])) {

  $username = mysqli_real_escape_string($db, $_POST['username']);
  $nume = mysqli_real_escape_string($db, $_POST['nume']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  if (empty($username)) { array_push($errors, "Numele de utilizator este necesar"); }
  if (empty($nume)) { array_push($errors, "Numele si prenumele este necesar"); }
  if (empty($password_1)) { array_push($errors, "Parola este necesara"); }
  if ($password_1 != $password_2) {
	array_push($errors, "Parolele nu corespund");
  }

  $user_check_query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['username'] === $username) {
      array_push($errors, "Nume de utilizator deja folosit.");
    }
  }

  if (count($errors) == 0) {
	$password = $password_1 ;
	$query = "INSERT INTO mydb.users (username, nume, password, tip_user) 
  			  VALUES('$username', '$nume', '$password', 'user')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "Acum esti conectat.";
  	header('location: index.php');
  }
}


// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Numele de utilizator este necesar");
  }
  if (empty($password)) {
  	array_push($errors, "Parola este necesara");
  }

  if (count($errors) == 0) {
  	$password = $password;
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "Acum esti conectat.";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Parola sau numele de utilizator este incorect/a.");
  	}
  }
}

?>