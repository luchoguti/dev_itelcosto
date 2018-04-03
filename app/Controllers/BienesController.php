<?php 

include_once "/../Models/BienesModel.php";


class BienesController
{

    private $model_bienes;


    function __construct() {
        $this->model_bienes = new BienesModel();
    }

	public function guardarBienes(){

        $guardar=$this->model_bienes->postBienes($_REQUEST);
        if($guardar){
            header('Location: index.php');
        }else{
            echo 'hubo un error al almacenar';
        }

	}

}

?>
