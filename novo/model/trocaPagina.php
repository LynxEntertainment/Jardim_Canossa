<?php
class trocaPagina {
    public $pagina;
    
    public function __construct() {
        if (empty($_GET['view'])){
            $this->pagina = "view/home.php";
        } else {
            $this->pagina = "view/".$_GET["view"].".php";
        }
    }
}