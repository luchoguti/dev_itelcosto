<?php 

/**
* 
*/
include_once "/../DB/ConexionDB.php";

class BienesModel extends ConexionDB
{
	
    private $datos_bienes;
    protected $conn;
    function __construct() {
        $this->datos_bienes = array();
        $this->conn=$this->connect();
    }
            
    public function getBienes(){
        $query=mysqli_query($this->conn,"SELECT * FROM `bienes`");
        if($query){
            while ($row = $query->fetch_object()){
                $this->datos_bienes[] = $row;
            }
            $this->close($this->conn);
        }
        return $this->datos_bienes;
    }

    public function postBienes($resquest){

        $query=mysqli_query($this->conn,"INSERT INTO bienes VALUES('".$resquest['id']."','".$resquest['direccion']."','".$resquest['ciudad']."','".$resquest['telefono']."','".$resquest['cod_postal']."','".$resquest['tipo']."','".$resquest['tipo']."')");
        if($query){
            return true;
        }else{
            require false;
        }

    }

}


?>