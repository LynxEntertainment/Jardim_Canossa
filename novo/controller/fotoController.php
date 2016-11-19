<?php

@include_once '../model/Foto.php';
@include_once 'model/Foto.php';

class fotoController {
    private $foto;
    
    function __construct() {
        $this->foto = new Foto();
    }

    function getFoto() {
        return $this->foto;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }
    
    function inserirFoto($galeria,$caminho){
        $this->foto->setFKGaleria($galeria);
        $this->foto->setCaminhoFoto($caminho);
        
        if($this->foto->inserirFoto()){
            return true;
        } else {
            return false;
        }
    }
    
    public static function listarFotos($galeria){
        return Foto::listarFoto($galeria);
    }
}
