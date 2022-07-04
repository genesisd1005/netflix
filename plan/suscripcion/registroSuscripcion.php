<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <title>Netflix</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="../../fontawesome-6.1.1/css/all.css" rel="stylesheet">
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

    if(isset($_GET['enviar'])){
        $cedula= $_GET['cedula'];
        $id= $_GET['id']; 
          

        if($db){

            $sql="SELECT * FROM clientes WHERE cedula = $cedula";
            $query_cliente=mysql_query($sql); 
            $count_clientes = mysql_num_rows($query_cliente);

            if($count_clientes > 0){

                $sql="SELECT * FROM suscripcion WHERE cedula_cliente = $cedula";
                $query_cliente_suscripcion=mysql_query($sql); 
                $count_clientes_suscripcion = mysql_num_rows($query_cliente_suscripcion);

                if($count_clientes_suscripcion == 0){
                    $sql="INSERT INTO suscripcion (cedula_cliente, id_planes) VALUES ('$cedula', $id)";
                    $insert_suscripcion= mysql_query($sql);



                    if($insert_suscripcion){
                        ?>
                        <div class="alert alert-success" role="alert">
                        Suscripcion registrada con exito!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
                        
                        </div>
                        <?php
                    }else{
                        ?>
                        <div class="alert alert-dismissible alert-danger" role="alert">
                        Error al registrar la suscripcion.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
                        </div>
                        <?php
                    }
                }else{
                    ?>
                    <div class="alert alert-dismissible alert-danger" role="alert">
                    Error! Este cliente ya tiene una suscripcion activa.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
                    </div>
                    <?php
                }
                
            }else{
                ?>
                <div class="alert alert-dismissible alert-danger" role="alert">
                Error! Cliente no registrado.
                <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
                </div>
                <?php
            }


            
        }
        
    }

    ?>


<div class="container">
<?php 
include("../../comunes/menu.php");
?>
<div class="row">
    <div class="col"></div>
    <div class="col col-lg-6">
        <form>
            <div class="mb-3" >
                <h2 class="text-center">Suscripcion</h2>
                <label for="exampleInputEmail1" class="form-label">Cedula:</label>
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="nacionalidad">
                        <option value="">-</option>
                        <option value="v">V</option>
                        <option value="e">E</option>
                </select>
                <input type="text" class="form-control" id="cedula" name="cedula">
                </div>
                <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Plan:</label>
                <select name="id" id="plan">
                    <option value="">seleccione plan</option>
                    <?php 
                        while($planes=mysql_fetch_array($query_planes)){
                        ?>
                            <option value="<? echo $planes["id"]?>"><? echo $planes["nombre_plan"]?> (<? echo $planes["precio"]?>$)</option>
                        <?php 
                        } 
                    ?>
                    
                </select>
                </div>
            <button type="submit" class="btn btn-primary" name="enviar">Guardar</button>
         </form>
    </div>
    <div class="col"></div>
  </div>
</div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</html>