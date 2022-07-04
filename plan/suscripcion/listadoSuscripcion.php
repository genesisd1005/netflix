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

        $sql="SELECT clientes.nombre, apellido, cedula,
        IF( nombre_plan IS NULL , FALSE, TRUE ) AS suscrito,
       IF( nombre_plan IS NULL , '', nombre_plan ) AS plan,
       IF( precio IS NULL, FALSE, precio )  AS precio
       FROM suscripcion
       RIGHT JOIN planes ON planes.id = suscripcion.id_planes
       RIGHT JOIN clientes ON clientes.cedula = suscripcion.cedula_cliente";
        $query=mysql_query($sql);   
    }

    ?>



<div class="container">

<?php 
include("../../comunes/menu.php");
?>
<div class="row">
    <div class="col col-lg-10 offset-lg-1">
        <table class= "table table-striped table-hover">
        <thead>
                <tr>
                    <td colspan="8">Listado de suscripcion</td>
                </tr>
            </thead>
             <tr>
                <td colspan="3">Clientes</td>
                <td rowspan="2">Suscripcion</td>
                <td colspan="2">Planes</td>
                <td colspan="2" rowspan="2">Acciones</td>
            </tr>
            <tr>
                <td>NOMBRE</td>
                <td>APELLIDO</td>
                <td>CEDULA</td>
                <td>PLAN</td>
                <td>PRECIO</td>
            </tr>
            <?php 
            while($clientes=mysql_fetch_array($query)){
            ?>
            <tr>
                <td><? echo $clientes["nombre"]?></td>
                <td><? echo $clientes["apellido"]?></td>
                <td><? echo $clientes["cedula"]?></td>
                <td><? echo $clientes["suscrito"]?></td>
                <td><? echo $clientes["plan"]?></td>
                <td><? echo $clientes["precio"]?></td>
                <td>
                <i class="fa-solid fa-trash-can"></i>
                </td>
                <td>
                <i class="fa-solid fa-pen-to-square"></i>
                </td>

            </tr>
            <?php 

        } ?>
            
        </table>
    </div>

</div>
</div>













  
</body>



<script>
    

    function isActive(){
        if(document.getElementById("condiciones").checked){
            document.getElementById("enviar").disabled = false;
        }else{
            document.getElementById("enviar").disabled = true;
        }
    }

</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</html>