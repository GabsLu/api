<?php
//ENCABEZADOS 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");//tipos de peticion se aceptaran en la API 

header('Content-Type: application/json; charset=utf-8');//tipos de archivo que se aceptaran que son de tipo JSON
$data = json_decode(file_get_contents("php://input"),true); //metodo para obtener datos completos de un archivo, true convierte el archivo 

//COMPROBAR QUE EL TIPO DE METODO SEA POST
//obtener el tipo de peticion yasea post,get...

$metodo= $_SERVER['REQUEST_METHOD'];

//para verificar que la conexion sea tipo POST

if($metodo=='POST'&& isset($data['inicio'])){

    include('iniciosesion/login.php');

   $sesion = new login();


    switch ($data['inicio']) {

        case "sesion":

        return $sesion->login ($data["datos"]);

            
            
            break;

        case "registro":
            
            return $sesion->registro ($data["datos"]);

       break;
    }

}

?>