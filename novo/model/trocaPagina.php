<?php
class trocaPagina {
    public $pagina;
    
    public function __construct() {
        if (empty($_GET['pagina'])){
            $this->pagina = "paginas/home.php";
        } else {
            $this->pagina = "paginas/".$_GET["pagina"].".php";
        }
    }
}