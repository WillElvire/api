<?php 


//recupere la locatisation de tous

function getLocation(){


    global $database;
    $data=null;
    $myquery=$database->query("SELECT *from geolocation");

    $count=$myquery->rowCount();


    if($count==0):

           $data=json_encode(["message"=>"aucune localisation"]);
          

    else:



     while($query=$myquery->fetchAll(PDO::FETCH_ASSOC)){

          $data=json_encode($query);

     }




    endif;
    
     

     return $data;
    


}
//contcion de localisation

function getCurrentLocation($email){

 global $database;

 $data=null;

 $myquery=$database->prepare("SELECT *from  geolocation where email=?");

 $myquery->execute(array($email));

 $result=$myquery->fetch(PDO::FETCH_ASSOC);
    
 $count=$myquery->rowCount();

 if($count==0 or $count!=1):

          
     return   json_encode($result=["message"=>"erreur"]);

 else:
    
       return json_encode($result);

         
 
 endif;



}
 //fonction d'authentification

function getUser($email,$password){


    global  $database;

    $myquery=$database->prepare("SELECT *from user where email=? and mdp=?");

    $myquery->execute(array($email,$password));

    $result=$myquery->fetch(PDO::FETCH_ASSOC);
    
    $count=$myquery->rowCount();

    if($count==0 or $count!=1):

             
         return json_encode($result=["message"=>"Aucun utilisateur avec ce mail"]);

    else:
       
          return json_encode($result);

            
    
    endif;


}


//cette fonction retourne tout les utilisateurs

function getAllUser(){


  global $database;

  $mydata=null;

  $queryString=$database->query("SELECT *from user");
  
  while($data=$queryString->fetchAll(PDO::FETCH_ASSOC)){
  
      $mydata=json_encode($data);


  }


  return  ($mydata!="")?$mydata:json_encode($mydata=["message"=>"liste vide"]);
      
      

}


//cette fonction nous envoi toutes les personnes qui ce sont deplacées
function Suspect(){


      global $database;

      $mydata=null;

      $queryString=$database->query("SELECT Upper(user.nom) as nom ,Upper(user.prenom) as prenom,user.localisation,user.telephone,geolocation.* from user inner join geolocation where user.email=geolocation.email");
 
      while($fetch=$queryString->fetchAll(PDO::FETCH_OBJ)):

             $mydata=json_encode($fetch);

      endwhile;


      return (strlen($mydata)!=0)?$mydata:json_encode($mydata=["message"=>" Aucun suspect"]);

}


//cette fonction permet de tracer un utilisateur;
function Tracert($email){


     global $database;

     $mydata=null;

     $queryString=$database->prepare("SELECT Upper(user.nom) as nom ,Upper(user.prenom) as  prenom ,user.localisation,user.telephone,geolocation.* from user inner join geolocation where user.email=geolocation.email and user.email=?");
     
     $queryString->execute(array(filter_var($email,FILTER_VALIDATE_EMAIL)));
    
     $row=$queryString->rowCount();

     if($row==0):

               $mydata=[

                     "message"=>" Erreur lors de la recherche",
               ];

     else:

               while($fetch=$queryString->fetchAll(PDO::FETCH_OBJ)):

                    $mydata=$fetch;

               endwhile;
    endif;


     return json_encode($mydata);

}
     //getMaps

     function LatLng($localisation){


         global $database;
         $result=null;
         $queryString=$database->prepare("SELECT longitude,latitude from user where localisation=?");
         $queryString->execute(array($localisation));
         $count=$queryString->rowCount();

         if($count==0):

             
                 $result=["message"=>"aucune localisation"];


         else:


               
               while( $data=$queryString->fetchAll(PDO::FETCH_ASSOC)):


                           $result=$data;
               
               endwhile;




         endif;


          return json_encode($result);


     }






