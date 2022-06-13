<?php
   include_once("myparam.inc.php");
   try{
      $pdo=new PDO('mysql:host='.MYHOST.';dbname='.DB,MYUSER,MYPASS);
   }
   catch(PDOException $e){
      echo $e->getMessage();
   }
?>