<?php
class trocaPagina {
    public $pagina;
    public $cat;
    
    public function __construct() {
        if (empty($_GET['cat']) || empty($_GET['pagina'])){
            $this->cat = "paginas/home.php";
        } else {
            $this->cat = "paginas/categorias/".$_GET["cat"].".php";
            $this->pagina = "paginas/".$_GET["pagina"].".php";
        }
    }
}