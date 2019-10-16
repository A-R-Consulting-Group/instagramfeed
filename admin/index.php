<?php include("password_protect.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="robots" content="noindex">
  <title>Editar Instagram Wall</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style type="text/css">

.logo {
    display: block;
    width: 150px;
    margin: 40px auto;}

</style>
</head>
<body>

  <?php
    $myFile=fopen("../conf/mydata.txt","r") or exit("Can’t open file!");
    

    // read each line of text from the text file

    $frase = fgets($myFile);
    $hashtag = fgets($myFile);
   

    fclose($myFile);

$myFile2=fopen("../conf/delay.txt","r") or exit("Can’t open file!");
 $tiempocambio = fgets($myFile2);
  $numerfotos = fgets($myFile2);

    fclose($myFile2);

  ?>
<div class="container">
<br><br><br>
<div class="row">
  <div class="col-sm-5">
<img src="../images/logo.svg" class="logo">
  </div>
  <div class="col-sm-7">
    <div class="row"><h3>Editar la configuración</h3></div>
       <form action="save.php" method="post" class="form-horizontal">
<form class="form-horizontal">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">Frase top</label>
    <div class="col-sm-8">
      <?php echo "<input size=\"20\" type=\"text\" name=\"frase\" value=\"$frase\" class=\"form-control\">"?>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-4 control-label">Hashtag (sin #) </label>
    <div class="col-sm-8">
      <?php echo "<input size=\"20\" type=\"text\" name=\"hashtag\" value=\"$hashtag\" class=\"form-control\">"?>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-4 control-label">Tiempo de cada publicación (en ms. 1000 = 1 seg.):</label>
    <div class="col-sm-8">
      <?php echo "<input size=\"20\" type=\"text\" name=\"tiempocambio\" value=\"$tiempocambio\" class=\"form-control\">"?>
    </div>
  </div>
    <div class="form-group">
    <label for="inputPassword3" class="col-sm-4 control-label">Número de publicaciones que aparecen:</label>
    <div class="col-sm-8">
      <?php echo "<input size=\"20\" type=\"text\" name=\"numerfotos\" value=\"$numerfotos\" class=\"form-control\">"?>
    </div>
  </div>
   <div class="form-group">
    <div class="col-sm-offset-5 col-sm-7">
      <input type="submit" value="Guardar" class="btn btn-primary">
    </div>
  </div>
</form>
  <br><br>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Configuración</a></li>
      <li><a href="../index.php">Ver Wall</a></li>
      <li><a href="index.php?logout=1">Logout</a></li>
    </ul>
  </div>
</nav>


  </div>
</div>



  </body>
</html>