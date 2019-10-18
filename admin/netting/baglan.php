<?php 



try {
 	$db=new PDO("mysql:host=localhost;dbname=identityofbooks;charset=utf8",'root','enes123321');


 } 
 catch (PDOException $e
 ) {echo $e->getMessage();

 	
 } ?>