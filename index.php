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

    

   

        






    

    
    
    ?>


<div class="container">


    


  

  


<br>



  

  

           
           

            
            

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