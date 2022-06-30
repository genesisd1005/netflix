<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Netflix</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="../fontawesome-6.1.1/css/all.css" rel="stylesheet">
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
<div class="row">
    <div class="col col-lg-10 offset-lg-1">
        <table class= "table table-striped table-hover">
            <thead>
                <tr>
                    <td colspan="4">Listado de planes</td>
                </tr>
            </thead>
            
            <tr>

                <td>PLAN</td>
                <td>PRECIO</td>
                <td colspan="2">Acciones</td>
            </tr>
            <?php 

            
            while($planes=mysql_fetch_array($query_planes)){
            ?>
            <tr>
                
                <td><? echo $planes["nombre_plan"]?></td>
                <td><? echo $planes["precio"]?></td>
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




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</html>