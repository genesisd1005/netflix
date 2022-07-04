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

    if(isset($_GET['enviar_plan'])){
        $plan= $_GET['plan'];
        $precio= $_GET['precio']; 
          

        if($db){
            $sql="INSERT INTO planes (nombre_plan, precio) VALUES ('$plan', $precio)";
            $insert_plan= mysql_query($sql);



            if($insert_plan){
                ?>
                <div class="alert alert-success" role="alert">
                Plan registrado con exito!
                <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
                
                </div>
                <?php
            }else{
                ?>
                <div class="alert alert-dismissible alert-danger" role="alert">
                Error al registrar el plan.
                <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
                </div>
                <?php
            }
        }
        
    }

    ?>


<div class="container">
<?php 
include("../comunes/menu.php");
?>
<div class="row">
    <div class="col"></div>
    <div class="col col-lg-6">
        <form>
            <div class="mb-3" >
                <h2 class="text-center">Nuevo Plan</h2>
                <label for="exampleInputEmail1" class="form-label">Plan</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="plan">
                </div>
                <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Precio</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="precio">
                </div>
            <button type="submit" class="btn btn-primary" name="enviar_plan">Enviar</button>
         </form>
    </div>
    <div class="col"></div>
  </div>
</div>













  
</body>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</html>