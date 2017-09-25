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
    $id = $objData->id;
    $name = $objData->name;
    $price = $objData->price;
    
    // lIMPIAR LOS DATOS 
    $id = trim($id);
    $name = stripslashes($name);
    $price = stripslashes($price);
    $name = trim($name);
    $price = trim($price);
    
   
    $db = new PDO($dns, $user, $pass);

    if($db){
        $sql = " UPDATE products SET name='".$name."',price='".$price."' WHERE id =".$id;
        $query = $db->prepare($sql);
        $query ->execute();
        if(!$query){
                   $dados = array('mensaje' => "No es posible editar los datos");
                   echo json_encode($dados);
         }
        else{
                   $dados = array('mensaje' => "Los datos se editados correctamente.");
                  echo json_encode($dados);
         };
    }
   else{
          $dados = array('mensaje' => "Error, intente nuevamente.");
          echo json_encode($dados);
    };