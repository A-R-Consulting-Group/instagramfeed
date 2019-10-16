<?php include("password_protect.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="robots" content="noindex">
  <title>Editar Twitter Wall</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <style type="text/css">

.logo {
    display: block;
    width: 150px;
    margin: 40px auto;}

</style>
</head>
<body>

<div class="container">
<br><br><br>
<div class="row">
  <div class="col-sm-5">
<img src="../images/logo.svg" class="logo">
  </div>
  <div class="col-sm-7">
    <div class="row"><h3>La configuración se ha guardado correctamente</h3></div>
    <strong>Frase superior</strong>: <?php echo $_POST["frase"]; ?><br>   
    <strong>Hashtag (sin #)</strong>: <?php echo $_POST["hashtag"]; ?><br>
    <strong>Tiempo de cada publicacion (en ms)</strong>: <?php echo $_POST["tiempocambio"]; ?> <br>
	<strong>Numero de fotos que se ven</strong>: <?php echo $_POST["numerfotos"]; ?> 
	<br><b>NOTA:</b> Si hay menos fotos en el hashtag que <?php echo $_POST["numerfotos"]; ?>, este valor se ignorará.
  <br><br>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li><a href="index.php">Configuración</a></li>
      <li class="active"><a href="../index.php">Ver Wall</a></li>
      <li><a href="index.php?logout=1">Logout</a></li>
    </ul>
  </div>
</nav>


  </div>
</div>











  <?php
  $myFile=fopen("../conf/mydata.txt","w") or exit("Can’t open file!");
  


  // Write each line of text into the text file file

  fwrite($myFile, $_POST["frase"]."\r\n");
  fwrite($myFile, $_POST["hashtag"]);
 


   fclose($myFile);


$myFile2=fopen("../conf/delay.txt","w") or exit("Can’t open file!");
   fwrite($myFile2, $_POST["tiempocambio"]."\r\n");
   fwrite($myFile2, $_POST["numerfotos"]."\r\n");

   fclose($myFile2);

  ?>



  </body>
</html>