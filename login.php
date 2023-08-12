<?php
include ('conexion.php');

class login{
  

    private $conexion;

    public function __construct(){
        $this->conexion = new Conexion(); 
    }
    

    public function login($datos){

        try{
            $sql= $this->conexion->prepare("
                SELECT
                    username,
                    password

                FROM 
                    usuarios
                WHERE
                    username = BINARY :username
                AND  password = BINARY :password LIMIT 1;
            ");


            $sql->bindValue(':username', $datos["username"]);
            $sql->bindValue(':password', $datos["password"]);
            $sql->execute();//ejecuta la consulata
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $datos= $sql->fetchAll();//lo guarda en un arreglo asociativo
            //pasa todos los datos a la variable asigna
           
            if($datos){
                echo 'Si';
                header('HTTP/1.1 200 OK');
            }else{
                echo 'No';
            header('HTTP/1.1 400 No');
            }
        }catch(PDOException $ex){
            echo 'Se capturo:', $ex->getMesssage(),"\n";
        }



        

    }



    public function registro($datos){

        try{
            $sql= $this->conexion->prepare("
               INSERT INTO usuarios (username, password) VALUES (:username, :password);
            ");


            $sql->bindValue(':username', $datos["username"]);
            $sql->bindValue(':password', $datos["password"]);
            //ejecuta la consulata
            //lo guarda en un arreglo asociativo
            //pasa todos los datos a la variable asigna
           
            if($sql->execute()){
                echo 'Si';
                header('HTTP/1.1 200 OK');
            }else{
                echo 'No';
            header('HTTP/1.1 400 No');
            }
        }catch(PDOException $ex){
            echo 'Se capturo:', $ex->getMesssage(),"\n";
        }

    }

}





 







?>