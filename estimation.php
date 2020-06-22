<!DOCTYPE html>
<html lang="en">
<?php

include_once 'config.php';
$conf = new config();
include( 'Authenticate.php' );
$page = 'estimate.php';

$routeid=$_GET['routeid'];
$bustime=$_GET['bustime'];
$regnumber=$_GET['egno'];
$rt=$conf->singlev(trasee." Where Id_Traseu='".$routeid."'");
$routename=$rt->Numar_Traseu;
$n=$conf->singlev(statii." Where Id_Statie='".$_GET['Id_Statie']."'"); 
$stationnamee=$n->Nume_statie;

if($_GET['Zi_sapt']==1)
      $day='Monday';
      else if($_GET['Zi_sapt']==2)
       $day='Tuesday';
      else if($_GET['Zi_sapt']==3)
       $day='Wednessday';
      else if($_GET['Zi_sapt']==4)
       $day='Thursday';
      else if($_GET['Zi_sapt']==5)
      $day='Friday';
      else if($_GET['Zi_sapt']==6)
       $day='Saturday';
      else
      $day='Sunday';
 if ( isset( $_POST[ 'estimare' ] ) ) {
	$error = "";

	$idroute= $_GET['routeid'];

	$stationid = $_GET['Id_Statie'];

    $day = $_GET['Zi_sapt'];
   

	if ( empty( $error ) ) {
		$data_post = array(  'Id_Traseu' => $idroute,'id_Users'=>$_SESSION['reg_id'],'registration_number'=>$regnumber, 'Id_Statie' => $stationid, 'Zi_sapt'=>$_GET['Zi_sapt'], 'Ora'=>$bustime, 'Data_estimare'=>$_POST['timesas']);
		$recodes = $conf->insert( $data_post, estimare );
		if ( $recodes == true ) {
		 	$success = "Time  <strong>Added </strong> Successfully";
            $conf->RedirectUser();
		}
	}
}
$timestamp = time(); 
$systemdate=date("H:i:s", $timestamp); 
?>


  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">



    <title>BusApp 2019 Desktop</title>
    
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom fonts for this template -->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="device-mockups/device-mockups.min.css">

    <!-- Custom styles for this template -->
    <link href="css/new-age.min.css" rel="stylesheet">
	
	
	
  </head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <body id="page-top">
  
  
  
  
  

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">BusApp 2019 Desktop</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        
		 Menu 
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#download">Download</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#functii">Functii</a>
            </li>
	        <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
			  <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#desprenoi">Despre Noi</a>
            </li>
			<li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#transurb">Transurb</a>
			</li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger w3-button w3-pink" href="logout.php">LOGOUT</a>
			</li>
          </ul>
        </div>
      </div>
    </nav>
	
    <header class="masthead">
	

	<br>	
	<br>	
	<br>	
	<br>	
	<br>

	<br>

 <br>
  <!--
<a href="logout.php" class="w3-button w3-pink w3-right">LOGOUT</a>
-->
<link rel="stylesheet" type="text/css" href="style.css">
<style>
label{
    color:black !important;
}
form{
        width: 86% !important;
}
section.tile.color.red {
    padding-bottom: 0px !important;
    padding-top: 0px !important;
}
.alert-danger {
    color: #721c24 !important;
    background-color: #c80a1b !important;
    
}
.small-uppercase {
    background: #c80a1b !important;
    
}
section.tile.color.greensea {
        padding-bottom: 0px !important;
    padding-top: 0px !important;
}
.alert-success {
   
    background-color: #008000 !important ;
   
}section#functii {
    background: white !important;
}
</style>

      <div class="container h-50">
        <div class="row h-100">
          <div class="col-lg-7 my-auto">
            <div class="header-content mx-auto">
    <!-- User Add Estimation Form -->
             <form method="post" action="">
             
  	<?php include('messages-display.php'); ?>
    <h2 style="color: black;">Ajuta-ne sa imbunatatim precizia informatiilor</h2>
  	<div class="input-group">
  	  <label>Numar Traseu</label>
  	  <input type="text" value="<?=$routename?>" name="Id_Traseu" readonly>
  	</div>
  	<div class="input-group">
  	  <label>Numele Statiei</label>
  	  <input type="text" value="<?=$stationnamee?>" name="Id_Statie" readonly>
  	</div>
  	<div class="input-group">
  	  <label>Ziua </label>
  	  <input  type="text" value="<?=$day?>" name="Zi_sapt" readonly>
  	</div>
    	<div class="input-group">
  	  <label>Ora Estimare </label>
  	  <input  type="text" value="<?=$systemdate?>" name="timesas"  readonly>
  	</div>
  <div class="input-group">
  	  <button type="submit" class="btn" name="estimare">Add Estimare</button>
  	</div>
  	
  </form>
       <!-- End Estimation Form -->
       
            </div>
          </div>
          <div class="col-lg-3 my-auto">
            <div class="device-container">
              <div class="device-mockup iphone6_plus portrait white">
                <div class="device">
                  <div class="screen">
                    <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                    <img src="img/demo-screen-1.jpg" class="img-fluid rounded" alt="">
                  </div>
                  <div class="button">
                    <!-- You can hook the "home button" to some JavaScript events or just remove it -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
	<section class="download bg-primary text-center" id="download">
      <div class="container">
        <div class="row">
          <div class="col-md-8 mx-auto">
            <h2 class="section-heading">Descoperiti aplicatia noastra!</h2>
            <p>&nbsp;</p>
            <div class="badges">
              <a class="badge-link" href="#"><img src="img/google-play-badge.svg" alt=""></a>
              <a class="badge-link" href="#"><img src="img/app-store-badge.svg" alt=""></a>
                            <a class="badge-link" href="#"><img src="img/fff.png" style="    border-radius: 5px;" alt=""></a>
            </div>
          </div>
        </div>
      </div>
    </section><section class="functii" id="functii">
      <div class="container">
        <div class="section-heading text-center cstm-family">
          <h2 class="cstm-family">Informatii Precise, Calatori Fericiti</h2>
          <p class="text-muted">Descopera avantajele aplicatiei noastre!</p>
          <hr>
        </div>
        <div class="row">
          <div class="col-lg-4 my-auto">
            <div class="device-container">
              <div class="device-mockup iphone6_plus portrait white col-lg-12">
                <div class="device col-lg-11 d-lg-none d-xl-block">
                  <div class="screen">
                    <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                    <img src="img/demo-screen-1.jpg" class="img-fluid" alt="">
                  </div>
                  <div class="button">
                    <!-- You can hook the "home button" to some JavaScript events or just remove it -->
                  </div>
                </div>
                <div class="device col-lg-11">
                  <div class="screen">
                    <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                    <img src="img/demo-screen-1.jpg" class="img-fluid" alt=""> </div>
                  <div class="button">
                    <!-- You can hook the "home button" to some JavaScript events or just remove it -->
                  </div>
                </div>
                <div class="device col-lg-11 offset-lg-0 offset-xl-0">
                  <div class="screen">
                    <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                    <img src="img/Untitled design.jpg" alt="" height="1300" class="img-fluid rounded"> </div>
                  <div class="button">
                    <!-- You can hook the "home button" to some JavaScript events or just remove it -->
                  </div>
                </div>
              </div>
            </div>
          </div>
           <div class="col-lg-8 my-auto">
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-8">
                  <div class="functii-item"><em class=""></em>
                    <h4 class="cstm-family" style=" color:Blue; font-size: 16x;"> <i class="icon-camera text-primary"></i>&nbsp;Disponibil pentru o gama variata de terminale</h4><BR>
                  </div>
                </div>
<BR>
<BR>
                <div class="col-lg-9">
                  <div class="functii-item">
                   <h4 class="cstm-family" style=" color:Green; font-size: 16x;"><i class="icon-camera text-primary"></i> 		Aplicatie usor de folosit ce permite tuturor </h4>
                  
                  <h4 class="cstm-family" style=" color:Green; font-size: 16x;"> &nbsp;	&nbsp;&nbsp;&nbsp;utlilizatorilor sansa de a trimite o estimare</h4>  
                  </div>
                </div>
              </div>
<BR>
              <div class="row">
                <div class="col-lg-6">
                  <div>
                    
					<h4 class="cstm-family"  style=" color:Violet; font-size: 16x;"><i class="icon-present text-primary"></i> 100% Gratis</h4><BR>
                  </div>
                </div>
<BR>
                <div class="col-lg-8">
                  <div class="functii-item">
                    <h4 class="cstm-family" style=" color:Red; font-size: 16x;">                    <i class="icon-lock-open text-primary"></i> 	&nbsp;Confidentialitatea datelor personale</h4>
                    <p>&nbsp;</p>
                    <p class="text-muted">&nbsp;</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
   <section class="cta">
      <div class="cta-content">
        <div class="container">
          <h2>Informatii precise.</h2>
          <a href="#contact" class="btn btn-outline btn-xl js-scroll-trigger">Mereu aproape!</a>
        </div>
      </div>
      <div class="overlay"></div>
    </section>

     <section class="contact bg-primary" id="contact">
      <div class="container">
        <h2> &nbsp; &nbsp;<i class="fa fa-heart" aria-hidden="true"></i> Din respect pentru calatori! <i class="fa fa-heart" aria-hidden="true"></i></h2>
        <ul class="list-inline list-social">
          <li class="list-inline-item social-twitter">
            <a href="#">
              <i class="fa fa-twitter"></i>
            </a>
          </li>
          <li class="list-inline-item social-facebook">
            <a href="#">
              <i class="fa fa-facebook"></i>
            </a>
          </li>
          <li class="list-inline-item social-google-plus">
            <a href="#">
              <i class="fa fa-google-plus"></i>
            </a>
          </li>
        </ul>
      </div>
    </section>
	  	  
   <section class="desprenoi bg-primary" id="desprenoi">
      <div class="container">
       <h1 style="text-align:center;" class="cstm-family">&nbsp; &nbsp; <b>Misiune si Viziune</b> <i class="fa fa-flag" aria-hidden="true"></i></h1>
	   <br>
<p class="cstm-text" ><b><i>Suntem o echipa tanara ce isi propune sa puna la dispozitia pasagerilor din Galati informatii precise referitoare la programul de circulatie al mijloacelor disponibile. Mai mult, punem la dispozitia utilizatorilor singura aplicatie ce afiseaza ora sosirii a unui anumit mijloc de transport precum si coordonatele celei mai apropiate statii, plecand de la pozitia acestuia pe harta. Totodata le permite utlizatorilor sa adauge o estimare a orei de sosire a mijloacelor de transport in statii, indiferent de clasa din care fac parte (vizitatori sau membrii ai comunitatii).</b></i></p>
            </a>
          </li>
        </ul>
      </div>
    </section>   <section class="transurb bg-primary" id="transurb">
      <div class="container">
       <h1 style="text-align:center;"  class="cstm-family">&nbsp; &nbsp; <b> Despre Reteaua Transurb Galati </b><i class="fa fa-globe" aria-hidden="true"></i></h1>
<br>
<p style="color:red" class="cstm-family" > Transportul urban ca serviciu public si modul său de organizare si desfăsurare reprezintă un jalon al calitătii si nivelului de civilizatie al orasului. In prezent S.C.Transurb S.A.,ca principal operator de transport din municipiul Galati, desfăsoară o serie de activităti menite să deservească o gamă cat mai largă de solicitări.Principalele activităti ale societătii sunt:</p></li>
<ol>
<ol type="1" >
<li><p style="font-size:18px;" class="cstm-family">Transport public local de călători cu autobuze, midibuze, troleibuze si tramvaie</p></li>
<li><p style="font-size:18px;" class="cstm-family">Transport special cu autobuze si tramvaie</p></li>
<li><p style="font-size:18px;" class="cstm-family">Inchirierea de mijloace de transport pentru curse ocazionale interne si externe</p></li>
<li><p style="font-size:18px;" class="cstm-family">Oferirea spre vanzare a mijloacelor fixe scoase din functiune</p></li>
<li><p style="font-size:18px;" class="cstm-family">Inchirierea de stalpi pentru afisarea de reclame publicitare</p></li>
<li><p style="font-size:18px;" class="cstm-family">Inchirierea de stalpi pentru sustinerea de cabluri telefonice,tv si fibră optică</p></li>
<li><p style="font-size:18px;" class="cstm-family">Inchirierea de mijloace de transport pentru amplasarea de reclame publicitare</p></li>
<li><p style="font-size:18px;" class="cstm-family">Efectuarea de inspectii tehnice la mijloacele de transport din afara societătii si din societate</p></li>
<li><p style="font-size:18px;" class="cstm-family">Efectuarea de reparatii pentru mijloacele de transport din societate</p></li>
            </a>
			</ol>
          </li>
        </ul>
      </div>
    </section>
	
    <footer>
      <div class="container">
        <p>&copy; Nastase Danut Busapp 2018. All Rights Reserved.</p>
        <ul class="list-inline">
          <li class="list-inline-item">
            <a href="#">Code</a>
          </li>
          <li class="list-inline-item">
            <a href="#">Travel</a>
          </li>
          <li class="list-inline-item">
            <a href="#">Repeat</a>
          </li>
        </ul>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/new-age.min.js"></script>

  </body>

</html>