<?php

@include_once '../model/Galeria.php';
@include_once 'model/Galeria.php';

class galeriaController {

    private $galeria;

    function __construct() {
        $this->galeria = new Galeria();
    }

    function getGaleria() {
        return $this->galeria;
    }

    function setGaleria($galeria) {
        $this->galeria = $galeria;
    }
    
    public function inserirGaleria(){
        $this->galeria = new Galeria();
        
        $this->galeria->setIdGaleria($this->galeria->inserirGaleria());
        
        if($this->galeria->getIdGaleria()){
            return true;
        } else {
            return false;
        }
    }
    
    public function inserirGaleriaIdioma($titulo,$descricao,$idioma){
        $this->galeria->setTituloGaleria($titulo);
        $this->galeria->setDescricaoGaleria($titulo);
        $this->galeria->setIdiomaGaleria($idioma);
        
        if($this->galeria->inserirGaleriaIdioma()){
            return true;
        } else{
            return false;
        }
    }
    
    public function selecionarGaleria($id,$idioma){
        $this->galeria->setIdGaleria($id);
        $this->galeria->setIdiomaGaleria($idioma);
        
        return $this->galeria->selecionarGaleria();
    }

    public static function listarGaleria($idioma,$pagina,$qtd) {
        return Galeria::listarGalerias($idioma,$pagina,$qtd);
    }

}
