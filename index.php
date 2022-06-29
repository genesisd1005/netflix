<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Netflix</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
         .container{
            float: left;
            margin: 30%;
        }
    </style>
</head>
<body>
    <?php 
     error_reporting(E_ALL);

     $connect=mysql_connect('localhost', 'root', 'genesisdsr2003');
    $db=mysql_select_db('netflix', $connect);

     if(isset($_GET['enviar'])){
        $nombre= $_GET['nombre'];
        $apellido= $_GET['apellido']; 
        $cedula= $_GET['cedula']; 
        $pais= $_GET['pais']; 
        $genero= $_GET['genero'];  

        if($db){
            $sql="INSERT INTO clientes (nombre, apellido, cedula, pais, genero) VALUES ('$nombre', '$apellido', '$cedula', '$pais', '$genero')";
            $insert_cliente= mysql_query($sql);
            


            if($insert_cliente){
                ?>
                <div class="alert alert-success" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
                Cliente registrado con exito!
                </div>
                <?php
            }else{
                ?>
                <div class="alert alert-dismissible alert-danger" role="alert">
                Error al registrar el cliente.
                <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
                </div>
                <?php
            }
        }
        
    }

    if(isset($_GET['enviar_plan'])){
        $plan= $_GET['plan'];
        $precio= $_GET['precio']; 
          

        if($db){
            $sql="INSERT INTO planes (nombre_plan, precio) VALUES ('$plan', $precio)";
            $insert_plan= mysql_query($sql);



            if($insert_plan){
                ?>
                <div class="alert alert-success" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
                Plan registrado con exito!
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

        






    

    if($db){

        $sql="SELECT clientes.nombre, apellido, cedula,
        IF( nombre_plan IS NULL , FALSE, TRUE ) AS suscrito,
       IF( nombre_plan IS NULL , '', nombre_plan ) AS plan,
       IF( precio IS NULL, FALSE, precio )  AS precio
       FROM suscripcion
       RIGHT JOIN planes ON planes.id = suscripcion.id_planes
       RIGHT JOIN clientes ON clientes.cedula = suscripcion.cedula_cliente";
        $query=mysql_query($sql);  


        $sql="SELECT * FROM planes";
        $query_planes=mysql_query($sql);  
    }
    
    ?>


<div class="container">


    <div class="row">
        <div class="col"></div>
        <div class="col col-lg-6">
            <form>
                <div class="mb-3" >
                    <h2 class="text-center">Nuevo Registro</h2>
                    <label for="exampleInputEmail1" class="form-label">Nombre:</label>
                    <input type="email" class="form-control" id="nombre" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Apellido:</label>
                    <input type="text" class="form-control" id="apellido">
                    </div>
                    <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Cedula:</label>
                    <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                        <option value="">-</option>
                        <option value="v">V</option>
                        <option value="e">E</option>
                    </select>
                    <input type="text" class="form-control" id="cedula">
                    </div>
                    <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Pais:</label>
                    <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                        <option value="">-</option>
                        <option value="ARG">Argentina</option>
                        <option value="CH">Chile</option>
                        <option value="CO">Colombia</option>
                        <option value="VE">Venezuela</option>
                    </select>
                    </div>
                    <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Genero:</label>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                    <label class="form-check-label" for="inlineRadio1">Femenino.</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                    <label class="form-check-label" for="inlineRadio2">Masculino.</label>
                    </div>
                    <br>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Aceptar terminos.
                    </label>
                    </div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="right" title="Tooltip on right">
                    Leer terminos.
                    </button>
                    <div>
                    <button class="btn btn-primary" type="submit" value="Submit">Enviar</button>
                    <button class="btn btn-primary" type="reset" value="Reset">Limpiar</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col"></div>
    </div>

    <br>


  <div class="row">
    <div class="col"></div>
    <div class="col col-lg-6">
        <form>
            <div class="mb-3" >
                <h2 class="text-center">Nuevo Plan</h2>
                <label for="exampleInputEmail1" class="form-label">Plan</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Precio</label>
                <input type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Aceptar terminos</label>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
         </form>
    </div>
    <div class="col"></div>
  </div>

  <div class="row">
    <div class="col"></div>
    <div class="col col-lg-6">
        <form>
            <div class="mb-3" >
                <h2 class="text-center">Suscripcion</h2>
                <label for="exampleInputEmail1" class="form-label">Cedula:</label>
                <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                        <option value="">-</option>
                        <option value="v">V</option>
                        <option value="e">E</option>
                </select>
                <input type="text" class="form-control" id="cedula">
                </div>
                <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Plan:</label>
                <input type="text" class="form-control" id="exampleInputPassword1">
                </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
         </form>
    </div>
    <div class="col"></div>
  </div>


<br>



  <div class="row">
    <div class="col col-lg-10 offset-lg-1">
        <table class= "table table-striped table-hover">
            <thead>
                <tr>
                    <td colspan="3">Listado de planes</td>
                </tr>
            </thead>
            
            <tr>

                <td>PLAN</td>
                <td>PRECIO</td>
                <td>Acciones</td>
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

  <div class="row">
    <div class="col col-lg-10 offset-lg-1">
        <table class= "table table-striped table-hover">
        <thead>
                <tr>
                    <td colspan="6">Listado de clientes</td>
                </tr>
            </thead>
             <tr>
                <td colspan="3">Clientes</td>
                <td rowspan="2">Suscripcion</td>
                <td colspan="2">Planes</td>
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
            </tr>
            <?php 

        } ?>
            
        </table>
    </div>

</div>

           
           

            
            

</div>


  </div>






  <div class="mb-3">
  
</div>
<div class="mb-3">
  
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