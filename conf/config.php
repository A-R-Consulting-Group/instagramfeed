<?php 

    $myFile=fopen("conf/mydata.txt","r") or exit("Can’t open file!");
$myFile2=fopen("conf/delay.txt","r") or exit("Can’t open file!");
    // read each line of text from the text file

    
    $frase = fgets($myFile);
    $elht = fgets($myFile);
     $tiempocambio = fgets($myFile2);
     $tiempocambio2 = fgets($myFile2);   
	 
	return $frase;
	return $elht;
    return $tiempocambio;



    return $tiempocambio;
    fclose($myFile2);
 fclose($myFile);

 ?>
