<style>
.small-uppercase {
    background:red;
    color:white;
}
.small-uppercase1 {
    background:green;
    color:white;
}
</style>
<?php 

if(!isset($success)){$success = $_REQUEST['success'];}

if(isset($success) AND !empty($success)){?>



<section class="tile color greensea">

  <div class="alert alert-success alert-dismissible">

    <h4 class="small-uppercase1">

      <?=$success?>

    </h4>

  </div>

</section>

<?php } if(!isset($error)){$error = $_REQUEST['error'];}?>

<?php if(isset($error) AND !empty($error)){?>

<section class="tile color red">

  <div class="alert alert-danger alert-dismissible">

    <h4 class="small-uppercase">

      <?=$error?>

    </h4>

  </div>

</section>

<?php } ?>



