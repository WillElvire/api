<?php 

 
try{
  
    $database = new PDO("mysql:host=localhost;dbname=alertCorona","root","root",array(PDO::ATTR_EMULATE_PREPARES=>false,PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    
}catch(Exception $e){


     die("Erreur de lors de la connection  à la base".$e->getMessage());

}