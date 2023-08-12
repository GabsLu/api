<?php
class Conexion extends PDO{
    /*private $host='localhost';
    private $db='movil2';
    private $usuario='root'; 
    private $pass='mysql';
    */
    private $host='localhost';
    private $db='id21137646_movil3';
    private $usuario='id21137646_root'; 
    private $pass='Luthor_34';
    public function __construct()
    {   
        try{
            parent::__construct('mysql:host='.$this->host.';dbname='.$this->db.';charaset=utf8',$this->usuario,$this->pass,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 
        }catch(PDOException $ex){ 
            echo 'Error: '.$ex->getMessage();
            exit;                
        }
    }    
}
?>