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
                Cliente registrado con exito!
                <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
                
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

    ?>


<div class="container">


    <div class="row">
        <div class="col"></div>
        <div class="col col-lg-6">
            <form>
                <div class="mb-3" >
                    <h2 class="text-center">Nuevo Registro</h2>
                    <label for="exampleInputEmail1" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Apellido:</label>
                    <input type="text" class="form-control" id="apellido" name="apellido">
                    </div>
                    <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Cedula:</label>
                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="nacionalidad">
                        <option value="">-</option>
                        <option value="v">V</option>
                        <option value="e">E</option>
                    </select>
                    <input type="text" class="form-control" id="cedula" name="cedula">
                    </div>
                    <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Pais:</label>
                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="pais">
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
                    <input class="form-check-input" type="radio" name="genero" id="inlineRadio1" value="f">
                    <label class="form-check-label" for="inlineRadio1">Femenino.</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="generro" id="inlineRadio2" value="m">
                    <label class="form-check-label" for="inlineRadio2">Masculino.</label>
                    </div>
                    <br>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="condiciones">
                    <label class="form-check-label" for="flexCheckDefault">
                        Aceptar terminos.
                    </label>
                    </div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="right" title="Tooltip on right">
                    Leer terminos.
                    </button>
                    <div>
                    <button class="btn btn-primary" type="reset" value="Reset">Limpiar</button>
                    <button class="btn btn-primary" type="submit" value="Submit" name="enviar">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col"></div>
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