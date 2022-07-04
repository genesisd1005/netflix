<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Netflix</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="./fontawesome-6.1.1/css/all.css" rel="stylesheet">
</head>
<body>
  
    <?php 
     error_reporting(E_ALL);

     $connect=mysql_connect('localhost', 'root', 'genesisdsr2003');
    $db=mysql_select_db('netflix', $connect);



    if($db){  

      $sql="SELECT * FROM planes";
      $query_planes=mysql_query($sql);  
  }
    ?>


<div class="container">
<?php 
include("./comunes/menu.php");
?>


<div class="row"> 
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://es.web.img3.acsta.net/pictures/22/05/10/17/09/1146719.jpg" class="d-block w-full" alt="PELICULAS">
    </div>
    <div class="carousel-item">
      <img src="https://media.vogue.mx/photos/5c0701f3e91fff92b2354df4/master/pass/las_mejores_series_de_2017_stranger_things_big_pretty_lies_the_handsmaid_tale_netflix_amazon_prime_hulu__289812538.jpg" class="d-block w-full" alt="SERIES">
    </div>
    <div class="carousel-item">
      <img src="https://tierragamer.com/wp-content/uploads/2022/04/Conversaciones-con-asesinos-Las-cintas-de-John-Wayne-Gacy.jpg" class="d-block w-full" alt="DOCUMENTALES">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>
<br>



<div class="row row-cols-1 row-cols-md-3 g-4">
<?php 
  while($planes=mysql_fetch_array($query_planes)){?>
    <div class="col">
      <div class="card h-100">
        <img src="https://play-lh.googleusercontent.com/0rgPYj0GwZ6txpYZrzoMdhwzqg7vY6C9B-Ol7jlaz-Ox2rgpD4Tr82ZgDqkirrEohbGm" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Plan</h5>
        <p class="card-text"><? echo $planes["nombre_plan"]?></p>
        <p class="card-text"><? echo $planes["precio"]?></p>
      </div>
      </div>
</div>
<?php }?>
</div>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</html>