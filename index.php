<!DOCTYPE html>
<html lang="en">
<?php

include_once 'config.php';
$conf = new config();
if ( $conf->SessionCheck() ){
	header( "location:index2.php" );
	}
$page = 'index.php';
?>


  <head>
 <style>
.clr{
    color:black !important; 
}
.headinggg {
    color:black !important;
    font-size: 14px !important;
    font-weight: bold;
}
</style>
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
  
 <?php
  
    $currentday=date('D');
      if($currentday=='Mon')
      $dayofweek='1';
      else if($currentday=='Tue')
      $dayofweek='2';
      else if($currentday=='Wed')
      $dayofweek='3';
      else if($currentday=='Thu')
      $dayofweek='4';
      else if($currentday=='Fri')
      $dayofweek='5';
      else if($currentday=='Sat')
      $dayofweek='6';
      else
      $dayofweek='7';
    $dayofweek1=date ('l');
   $currenttime=date("H:i");
   $cenvertedTimepluson = date('H:i',strtotime('+1 hour'));
 $query=" Select Id_Statie,Id_Traseu from programare WHERE  Id_Traseu IN('1','2','3','4') AND Zi_sapt=".$dayofweek." AND Ora>='".$currenttime."' AND Ora<='".$cenvertedTimepluson."'";
   $results = $conf->QueryRun( $query); 
   ?>
           
  
  
  
  

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
              <a class="nav-link js-scroll-trigger w3-button w3-purple" href="login.php">AUTENTIFICARE</a>
			</li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger w3-button w3-pink" href="register.php">INREGISTRARE</a>
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
 <a href="login.php" class="w3-button w3-purple w3-left">AUTENTIFICARE</a>
 <a href="register.php" class="w3-button w3-pink w3-right">INREGISTRARE</a>
-->



      <div class="container h-50">
        <div class="row h-100">
          <div class="col-lg-7 my-auto">
            <div class="header-content mx-auto">
            
            
            <div id="map" style="width: 500px; height: 400px;"></div>
           
             <!-- Google map api Script (Integrare -->
            <script type="text/javascript">
            var lati;
var longi;
var currentadd;

if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
       
             lati=position.coords.latitude;
            longi=position.coords.longitude;       
            
            var newadd=new google.maps.LatLng(lati,longi);

var geocoder = geocoder = new google.maps.Geocoder();
            geocoder.geocode({ 'latLng': newadd }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
              
                        currentadd=results[1].formatted_address;
                    localStorage.setItem("currentadd11",currentadd);
                      
 } } ) 
      
         var curnt=localStorage.getItem("currentadd11");
    var locations = [
     ['<Strong class=clr><center>You are Here</center><br>'+curnt+'</Strong>', lati, longi],
   
     
    ];
   <?php
   $mylatitude;
   $mylongitude;
   if($longitude==""||$latitude=="")
   {
    $mylatitude=45.435385;
    $mylongitude=28.055699;
   }
   else{
    $mylatitude=$latitude;
    $mylongitude=$longitude;
   }
    ?>
longiget=<?=$mylongitude?>;
latiget=<?=$mylatitude?>;

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 13,
      center: new google.maps.LatLng(lati,longi),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
		icon: 'http://maps.google.com/mapfiles/ms/icons/green-dot.png',
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
    
    })
   
      
    } 
  </script>
            
            
            
            
            
            
            <!-- End Google Map Api Script Integrare)-->
            
            
            
				 <br/>
              <a href="#download" class="btn btn-outline btn-xl js-scroll-trigger">Incearca si tu!!</a>
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
    </section>
<section class="functii" id="functii">
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
<p class="cstm-text" ><b><i>Suntem o echipa tanara ce isi propune sa puna la dispozitia pasagerilor din Galati informatii precise referitoare la programul de circulatie al mijloacelor de transport. Mai mult, punem la dispozitia utilizatorilor singura aplicatie ce afiseaza ora sosirii a unui anumit mijloc de transport precum si coordonatele celei mai apropiate statii, plecand de la pozitia acestuia pe harta. Totodata le permite utlizatorilor sa adauge o estimare a orei de sosire a mijloacelor de transport in statii.</b></i></p>
            </a>
          </li>
        </ul>
      </div>
    </section>
	
    <section class="transurb bg-primary" id="transurb">
      <div class="container">
       <h1 style="text-align:center;"  class="cstm-family">&nbsp; &nbsp; <b> Despre Reteaua Transurb Galati </b><i class="fa fa-globe" aria-hidden="true"></i></h1>
<br>
<p style="color:red" class="cstm-family" > Transportul urban ca serviciu public și modul său de organizare și desfășurare reprezintă un jalon al calității și nivelului de civilizație al orașului. În prezent S.C.Transurb S.A.,ca principal operator de transport din municipiul Galați, desfășoară o serie de activități menite să deservească o gamă cât mai largă de solicitări.Principalele activități ale societății sunt:</p></li>
<ol>
<ol type="1" >
<li><p style="font-size:18px;"  class="cstm-family">Transport public local de călători cu autobuze, minibuze, troleibuze și tramvaie</p></li>
<li><p style="font-size:18px;" class="cstm-family">Transport special cu autobuze și tramvaie</p></li>
<li><p style="font-size:18px;" class="cstm-family">Închirierea de mijloace de transport pentru curse ocazionale interne și externe</p></li>
<li><p style="font-size:18px;" class="cstm-family">Oferirea spre vânzare a mijloacelor fixe scoase din funcțiune</p></li>
<li><p style="font-size:18px;" class="cstm-family">Închirierea de stâlpi pentru afișarea de reclame publicitare</p></li>
<li><p style="font-size:18px;" class="cstm-family">Închirierea de stâlpi pentru susținerea de cabluri telefonice,tv și fibră optică</p></li>
<li><p style="font-size:18px;" class="cstm-family">Închirierea de mijloace de transport pentru amplasarea de reclame publicitare</p></li>
<li><p style="font-size:18px;" class="cstm-family">Efectuarea de inspecții tehnice la mijloacele de transport din afara societății și din societate</p></li>
<li><p style="font-size:18px;" class="cstm-family">Efectuarea de reparații pentru mijloacele de transport din societate</p></li>
            </a>
			</ol>
          </li>
        </ul>
      </div>
    </section>
	
    <footer>
      <div class="container">
        <p>&copy; BusApp 2019. Lucrare de disertatie.</p>
        <ul class="list-inline">
          <li class="list-inline-item">
            <a href="#">Danut</a>
          </li>
          <li class="list-inline-item">
            <a href="#">Nastase</a>
          </li>
          <li class="list-inline-item">
            <a href="#">2019</a>
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