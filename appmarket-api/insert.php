<?php
header("Access-Control-Allow-Origin:http://localhost:8100");
header("Content-Type: application/x-www-form-urlencoded");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
    //PARAMETROS DE LA BASE DE DATOS 
    $dns = "mysql:host=localhost;dbname=appmarket";
    $user = "root";
    $pass = "";

    //RECUPERAR DATOS DEL FORMULARIO
    $data = file_get_contents("php://input");
    $objData = json_decode($data);
    
    // ASIGNAR LOS VALORES A LA VARIABLE
    $name = $objData->name;
    $price = $objData->price;
    
    // lIMPIAR LOS DATOS 
    $name = stripslashes($name);
    $price = stripslashes($price);
    $name = trim($name);
    $price = trim($price);
    
   
    $db = new PDO($dns, $user, $pass);
   
    if($db){
        $sql = " insert into products values(NULL,'".$name."','".$price."','101')";
        $query = $db->prepare($sql);
        $query ->execute();
        if(!$query){
                   $datos = array('mensaje' => "No se ha registrado! ");
                   echo json_encode($datos);
         }
        else{
                   $datos = array('mensaje' => "Los datos se ingrearon correctamente");
                  echo json_encode($datos);
         };
    }
   else{
          $datos = array('mensaje' => "Error, intente nuevamente");
          echo json_encode($datos);
    };

    ?>