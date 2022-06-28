<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Netflix</title>
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
            echo $sql;


            if($insert_cliente){
                echo"<script>alert('Cliente registrado con exito')</script>";
            }else{
                echo"<script>alert('Error al registrar al cliente')</script>";
            }
        }
        
    }

    if(isset($_GET['enviar_plan'])){
        $plan= $_GET['plan'];
        $precio= $_GET['precio']; 
          

        if($db){
            $sql="INSERT INTO planes (nombre_plan, precio) VALUES ('$plan', $precio)";
            $insert_plan= mysql_query($sql);
            echo $sql;


            if($insert_plan){
                echo"<script>alert('Plan registrado con exito')</script>";
            }else{
                echo"<script>alert('Error al registrar el plan')</script>";
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



  

   
    <!--
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
    -->



    

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
    
        <div class="form_continer" >
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
    </div>

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

    <div class="columna">
        <table class= "table">
            <thead>
                <tr>
                    <td colspan="2">Listado de planessssssssss</td>
                </tr>
            </thead>
            
            <tr>

                <td>PLAN</td>
                <td>PRECIO</td>
            </tr>
            <?php 

            
            while($planes=mysql_fetch_array($query_planes)){
            ?>
            <tr>
                
                <td><? echo $planes["nombre_plan"]?></td>
                <td><? echo $planes["precio"]?></td>
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


</html>