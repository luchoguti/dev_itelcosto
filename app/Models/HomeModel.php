<?php 

/**
* 
*/
include_once "/../DB/ConexionDB.php";

class HomeModel extends ConexionDB
{
	
    private $home;
    protected $conn;
    function __construct() {
        $this->home = array();
        $this->conn=$this->connect();
    }
            
    /*public function getHome(){
        $query=mysqli_query($this->conn,"SELECT * FROM `tb`");
        if($query){
            while ($row = $query->fetch_object()){
                $this->home[] = $row;
            }
            $this->close($this->conn);
        }
        return $this->home;
    }*/

    public function getHome($ruta){

        $dataJson=file_get_contents($ruta."app/DB/data-1.json");
        return json_decode($dataJson);

    }
    public function filterJson($request,$ruta){

        $dataJson=json_decode(file_get_contents($ruta."app/DB/data-1.json"),true);
        $result=array();
        foreach ($dataJson as $key => $json_filter) {
            if($json_filter['Tipo']==$request['tipo'] && $json_filter['Ciudad']==$request['ciudad']){
                $result[]=$dataJson[$key];
            }
        }
        return json_encode($result);
    }

}


?>