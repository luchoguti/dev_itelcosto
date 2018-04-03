<?php 

/**
* 
*/
include_once "/../Models/HomeModel.php";
include_once "/../Models/BienesModel.php";



class HomeController
{

    private $model_home;
    private $model_bienes;


    function __construct() {
        
        $name_project=explode('/',$_SERVER['REQUEST_URI'] );       
        $this->ruta_public=$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/'.$name_project[1].'/';
        $this->model_home = new HomeModel();
        $this->model_bienes = new BienesModel();
    }

	public function index(){

		//header
        //las vista que requiera
        //footer
        
        $title = "Home";
        $data_search = $this->model_home->getHome($this->ruta_public);
        $lista_general = $this->gethtml_render($data_search,0);
        
        $result_query=$this->model_bienes->getBienes();
        $lista_db = $this->gethtml_render($result_query,1);

        require_once 'app/Views/header.php';
        require_once 'app/Views/home.php';
        require_once 'app/Views/footer.php';


	}

    public function getFilter(){

        $data_search = json_decode($this->model_home->filterJson($_REQUEST,$this->ruta_public));
        $lista = $this->gethtml_render($data_search,0);
        echo $lista;

    }

    protected function gethtml_render($datos,$estado){

      $lista='';
      $lista.="<ul><li>";
      foreach ($datos as $registers) {
        if($estado==0){
            $lista.="<form action='index.php' method='post'><ul>";
        }else{
            $lista.="<ul>";
        }
        $lista.="<input type='hidden' name='action' value='guardarBienes'><input type='hidden' name='controller' value='Bienes'><li><span>Id:<b>".$registers->Id."</b></span><input type='hidden' name='id' value='".$registers->Id."'></li>";
        $lista.="<li><span>Direccion:<b>".$registers->Direccion."</b></span><input type='hidden' name='direccion' value='".$registers->Direccion."'></li>";
        $lista.="<li><span>Ciudad:<b>".$registers->Ciudad."</b></span><input type='hidden' name='ciudad' value='".$registers->Ciudad."'></li>";
        $lista.="<li><span>Telefono:<b>".$registers->Telefono."</b></span><input type='hidden' name='telefono' value='".$registers->Telefono."'></li>";
        $lista.="<li><span>Codigo_Postal:<b>".$registers->Codigo_Postal."</b></span><input type='hidden' name='cod_postal' value='".$registers->Codigo_Postal."'></li>";
        $lista.="<li><span>Tipo:<b>".$registers->Tipo."</b></span><input type='hidden' name='tipo' value='".$registers->Tipo."'></li>";
        $lista.="<li><span>Precio:<b>".$registers->Precio."</b></span><input type='hidden' name='precio' value='".$registers->Precio."'></li>";
        if($estado==0){
            $lista.="<li><div class='botonField'>
                          <input type='submit' class='btn pink' value='Guardar'>
                         </div></li>";
        }
        $lista.="<li><div class='divider'></div></li>";
        
        if($estado==0){
           $lista.="</ul></form>";
        }else{
           $lista.="</ul>";
        }
      }
       
      $lista.="</li></ul></form>";
      return $lista;
    }


}

?>