<?php 

function createUser($nom,$prenom,$email,$mdp,$longitude,$latitude){


       global $database;

       $myquery=$database->prepare("INSERT INTO user(nom,prenom,longitude,latitude,email,mdp) values (?,?,?,?,?,?)");

       if($myquery->execute(array($nom,$prenom,$longitude,$latitude,$email,$mdp))):

                 
               $respone=verify($email,$mdp);
               

               if($respone==true):

                   
                           return json_encode("data enregistré");
               else:

                         return json_encode("not data saved");

               endif;
                

       else:



             return json_encode("data not saved");



       endif;
      

}



function verify($email,$mdp){


      global $database;


      $bool=false;

      $query=$database->prepare("SELECT * from user where  email= ? and mdp=?");

      $query->execute(array($email,$mdp));

      $count=$query->rowCount();


      if($count==1){

            $bool=true;

      }else{

            $bool=false;

      }


      return $bool;

}




function PostLocation($longitude,$latitude,$email){


      global $database;
      $myquery=null;
      $queryString=$database->prepare("INSERT INTO geolocation(longitude,latitude,email) values  (?,?,?)");
      
      if($queryString->execute(array($longitude,$latitude,$email))):


      else:


      endif;


}