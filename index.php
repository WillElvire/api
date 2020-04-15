<?php 


include "get.php";
include "post.php";
include "db.php";



header("Content-Type:application/json; charset-UTF-8");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Max-Age: 86400'); 
header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); 


$server=$_SERVER["REQUEST_METHOD"];
$entityBody = file_get_contents('php://input');



switch ($server)
{ 



  case  "GET" or "get" or "gEt" or "get":

       if(isset($_GET['action']) and $_GET['action']=="user"):


               if(isset($_GET['email']) and isset($_GET['mdp'])):
               
          
                         echo  getUser($_GET['email'],$_GET['mdp']);
               else:

                         echo  getAllUser();

               endif;

      else : 
        
             if(isset($_GET['action']) and $_GET['action']=="geolocation"):

                       if(isset($_GET['email'])):

                             echo getCurrentLocation($_GET["email"]);
                      
                       else:
 
                            echo getLocation();


                       endif;
                  
            else:

                  
                 if(isset($_GET['action']) and $_GET['action']=='tracert'):

                           
                                if(isset($_GET['email'])):

                                     echo Tracert($_GET["email"]);
                              
                                else:

                                     echo Suspect();


                                endif;
               

                 else:


                       if( isset($_GET['action']) and $_GET["action"]=='map'):

                             if(isset($_GET['local'])):

                                  echo LatLng($_GET['local']);

                             endif;


                       else:

                         


                       endif;



                
                 endif;

            

            endif;


       endif;

  break;


  case "POST" or "posT" or "Post" or "POSt":


      print_r("value".json_decode($entityBody));
       //$email=$data->{"data"}->{"email"};
       //$mdp=$data->{"data"}->{"mdp"};
       
       



  break;





}





































