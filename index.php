<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link href="style.css" rel="stylesheet">
  <?php include 'conf/config.php';?>
	<style>

	.div { height:100vh;width:100vh;}
	.col-md-4.item_box:nth-child(3n+1) {clear: both;}
	* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides {display: none}
img {vertical-align: left;}
.photo-thumb {margin-left: -10px; margin-bottom: 20px;height:75vh; width: 75vh; }
        ul, li {
        padding: 0;
        margin: 0;
        list-style: none inside;
        }

        ul.slider {
        position: relative;
        }

        ul.slider li {
        opacity: 0;
        transition: opacity .5s;
        position: absolute;
        }

        ul.slider li:first-child {
            opacity: 0;
        }

        ul.slider li:target {
            opacity: 1;
        }

        /* 
           CSS Slider

        */

        ul.slider {
        padding: 0px;
        }

        ul.slider li {
        width: 100%;
        height: 100%;
		margin-bottom:-50px;
		margin-top:-20px;
        transition: opacity .5s;
        text-align: center;
        }


	</style>
</head>
<body>
<div class="">
	<?php
	function scrape_insta_hash($tag) {
		$insta_source = 
		file_get_contents('https://www.instagram.com/explore/tags/'.$tag.'/'); 
		$shards = explode('window._sharedData = ', $insta_source);
		$insta_json = explode(';</script>', $shards[1]); 
		$insta_array = json_decode($insta_json[0], TRUE);
		return $insta_array; 
	}
	$tag = $elht; 
	$results_array = scrape_insta_hash($tag);
	$limit = count($results_array['entry_data']['TagPage'][0]['graphql']['hashtag']['edge_hashtag_to_media']['edges']); 
	$image_array= array(); 
	for ($i=0; $i < $limit; $i++) { 
		$latest_array = $results_array['entry_data']['TagPage'][0]['graphql']['hashtag']['edge_hashtag_to_media']['edges'][$i]['node'];
		$image_data  = $latest_array['thumbnail_src'];
		array_push($image_array, $image_data);	
	}?>
	    <div id="wrapper">
<?php $gestor = fopen("conf/delay.txt", "r");
    $primer = fgets($gestor);
	$fotosn = fgets($gestor);
	fclose($gestor);

?>
	<div class="container-fluid marco">

	 <div class="row titulo">
     	<div class="col-sm-1 imagen2"><span id="logo"><img src="images/logo.svg"></span></div>
        <div class="col-sm-10">
            <h1 class="text-center frase"><font size="5px"><?php echo $frase; ?></font></h1>
        </div>
        <div class="col-sm-1"></div>
    </div><?php	
	$imagenes = 0;
	foreach ($image_array as $image) {
		
		$imagenes = $imagenes + 1;
	}
	?>
 <ul class="slider">
 <?php
 $i = 0;
	for ($i = 0; $i < $imagenes; $i++) {
		$vartemp = $i+1;
		echo "<li id='slide".$vartemp."'>";
        echo "<img id='sliderasd' class='photo-thumb' src='".$image_array[$i]."'>";
		echo "</li>";
   }?>
	</ul>

</div>
	<script>
	window.location.hash = "slide1";
	var tiempo = <?php echo $tiempocambio; ?>;
	var tam = <?php echo $imagenes; ?>;
	
	var slideact = 1;
	var myVar = setInterval(myTimer, tiempo);
	var entero = <?php echo $fotosn; ?>;
	function myTimer() {
			if(tam == 0){
				window.location.reload();
			}
			else if(slideact== tam || slideact  == entero){
				slideact--;
				window.clearInterval(myVar);
				
				window.setTimeout(recarga, tiempo);
		

			}
		slideact++;
		
		window.location.hash = "slide" + slideact.toString();
		
	}
	function recarga(){
		
		window.location.reload();
	}

	</script>


	</div>
	

</div>


</body>
</html>
