<?php

class trocaURL {
    public $url;
    
    public function __contruct(){
        if(empty($_GET['paginas'])){
            $this->url = "paginas/home.php";
        } else {
            $this->url = "paginas/".$_GET["pagina"].".php";
        }
    }
    
}
