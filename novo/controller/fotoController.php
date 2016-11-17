<?php

@include_once '../model/Foto.php';
@include_once 'model/Foto.php';

class fotoController {
    private $foto;
    
    function __construct() {
        
    }

    function getFoto() {
        return $this->foto;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }
    
    public static function listarFotos($galeria){
        return Foto::listarFoto($galeria);
    }
}
