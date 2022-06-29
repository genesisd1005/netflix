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



  

    <div class="form_continer" >
        <h2 class="text-center">Suscripcion</h2>
        <form  method="GET" action="?" >
            <table class="form_table" >
                <tr>
                    <td><span>Email o numero de telefono:</span></td>
                    <td><input type="text" name="suscripcion" /></td>
                </tr>
                <tr>
                    <td><span>Contraseña:</span></td>
                    <td><input type="password" name="contraseña"/></td>
                </tr>
                <tr>
                    <td><span>Planes:</span></td>
                    <td>
                        <select type="text" name="planes" id="">
                            <option value="">-</option>
                            <option value="p1">Plan basico 5$</option>
                            <option value="p2">Plan estandar 10$</option>
                            <option value="p3">Plan premium 13$</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><br><input type="submit" name="enviar" value="Aceptar"/></td>
                </tr>
            </table>
        </form>
    </div>



    

  <div class= "container">

  <div class="form_continer">
        <h2 class="text-center">Nuevo Registro</h2>
        <form  method="GET" action="?" >
            <table class="form_table">
                <tr>
                    <td><span>Nombre: </span></td>
                    <td colspan="5"><input class="imput_total" type="text" name="nombre" maxlength="20" required/><br></td>
                </tr>
                <tr>
                    <td><span>Apellido: </span></td>
                    <td colspan="5"> <input class="imput_total" type="text" name="apellido" maxlength="20" required/></td>
                </tr>
                <tr>
                    <td><span>Cedula: </span></td>
                    <td>
                        <select name="nacionalidad" required>
                            <option value="">-</option>
                            <option value="E">E-</option>
                            <option value="V">V-</option>
                        </select>
                    </td>
                    <td colspan="3">
                        <input class="imput_total" type="text" name="cedula" maxlength="11" required/>
                    </td>
                <tr>
                    <td><span>Pais: </span></td>
                    <td colspan="4">
                        <select class="imput_total" type="text" name="pais" required>
                            <option value="">-</option>
                            <option value="ARG">Argentina</option>
                            <option value="CH">Chile</option>
                            <option value="CO">Colombia</option>
                            <option value="VE">Venezuela</option>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td><span>Genero: </span></td>
                    <td><input type="radio" name="genero" value="f" required /></td>
                    <td><span>Femenino: </span></td>
                    <td><input type="radio" name="genero" value="m" required/></td>
                    <td><span>Masculino: </span></td>
                </tr>
                <tr>
                    <td><span>Acepto: </span></td>
                    <td><input type="checkbox" name="condiciones" id="condiciones" onClick="isActive()" required/></td>
                    <td colspan="4"><input type="button" name="leer" value="Leer terminos" /></td>
                </tr>
                
                    <input type="hidden" name="id_user" value="1" /></td>
                
                <tr >
                    
                    <td colspan="6" class="text-center" style="padding-top:10px"><input id="enviar" type="submit" name="enviar" value="Registrar" disabled />
                    <input type="reset" name="reset" value="Limpiar" /></td>
                </tr>
            </table>
        </form>
    </div>
        <br>



<div class="container">


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
                    <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Aceptar terminos</label>
                </div>
                <button type="submit" class="btn btn-primary">Enviar

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="red" d="M135.2 17.69C140.6 6.848 151.7 0 163.8 0H284.2C296.3 0 307.4 6.848 312.8 17.69L320 32H416C433.7 32 448 46.33 448 64C448 81.67 433.7 96 416 96H32C14.33 96 0 81.67 0 64C0 46.33 14.33 32 32 32H128L135.2 17.69zM31.1 128H416V448C416 483.3 387.3 512 352 512H95.1C60.65 512 31.1 483.3 31.1 448V128zM111.1 208V432C111.1 440.8 119.2 448 127.1 448C136.8 448 143.1 440.8 143.1 432V208C143.1 199.2 136.8 192 127.1 192C119.2 192 111.1 199.2 111.1 208zM207.1 208V432C207.1 440.8 215.2 448 223.1 448C232.8 448 240 440.8 240 432V208C240 199.2 232.8 192 223.1 192C215.2 192 207.1 199.2 207.1 208zM304 208V432C304 440.8 311.2 448 320 448C328.8 448 336 440.8 336 432V208C336 199.2 328.8 192 320 192C311.2 192 304 199.2 304 208z"/></svg>


                </button>
            </form>
        </div>
        <div class="col"></div>
    </div>





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
                <input type="password" class="form-control" id="exampleInputPassword1">
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
                <h2 class="text-center">Nuevo Plan</h2>
                <label for="exampleInputEmail1" class="form-label">Plan</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Precio</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
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
                <td>Acciomes</td>
            </tr>
            <?php 

            
            while($planes=mysql_fetch_array($query_planes)){
            ?>
            <tr>
                
                <td><? echo $planes["nombre_plan"]?></td>
                <td><? echo $planes["precio"]?></td>
                <td>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M135.2 17.69C140.6 6.848 151.7 0 163.8 0H284.2C296.3 0 307.4 6.848 312.8 17.69L320 32H416C433.7 32 448 46.33 448 64C448 81.67 433.7 96 416 96H32C14.33 96 0 81.67 0 64C0 46.33 14.33 32 32 32H128L135.2 17.69zM31.1 128H416V448C416 483.3 387.3 512 352 512H95.1C60.65 512 31.1 483.3 31.1 448V128zM111.1 208V432C111.1 440.8 119.2 448 127.1 448C136.8 448 143.1 440.8 143.1 432V208C143.1 199.2 136.8 192 127.1 192C119.2 192 111.1 199.2 111.1 208zM207.1 208V432C207.1 440.8 215.2 448 223.1 448C232.8 448 240 440.8 240 432V208C240 199.2 232.8 192 223.1 192C215.2 192 207.1 199.2 207.1 208zM304 208V432C304 440.8 311.2 448 320 448C328.8 448 336 440.8 336 432V208C336 199.2 328.8 192 320 192C311.2 192 304 199.2 304 208z"/></svg>
                </td>
            </tr>
            <?php 

        } ?>
            
        </table>
    </div>
  </div>

</div>





    
        <!--<div class="form_continer" >
        <h2 class="text-center">Nuevo Plan</h2>
        <form  method="GET" action="?" >
            <table class="form_table" >
                <tr>
                    <td><span>Plan:</span></td>
                    <td><input type="text" name="plan" maxlength="20" required/></td>
                </tr>
                <tr>
                    <td><span>Precio:</span></td>
                    <td><input type="text" name="precio" maxlength="5" placeholder="00.00" required/></td>
                </tr>
                <tr>
                    <td class="text-center"><br><input type="submit" name="enviar_plan" value="Registrar"/>
                    <input type="reset" name="reset" value="Limpiar"/><td>
                </tr>
            </table>
        </form>
    </div>-->

    <div class="columna">

        <table class= "table">
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