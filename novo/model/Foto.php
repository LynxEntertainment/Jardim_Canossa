<?php

include_once 'model/Consulta.php';
include_once '../model/Consulta.php';

class Foto {

    private $idFoto;
    private $FKGaleria;
    private $caminhoFoto;

    function __construct() {
        
    }

    function getIdFoto() {
        return $this->idFoto;
    }

    function getFKGaleria() {
        return $this->FKGaleria;
    }

    function getCaminhoFoto() {
        return $this->caminhoFoto;
    }

    function setIdFoto($idFoto) {
        $this->idFoto = $idFoto;
    }

    function setFKGaleria($FKGaleria) {
        $this->FKGaleria = $FKGaleria;
    }

    function setCaminhoFoto($caminhoFoto) {
        $this->caminhoFoto = $caminhoFoto;
    }
    
    public function inserirFoto(){
        $sql = "INSERT INTO foto ("
                . "FK_galeria,"
                . "caminho_foto) "
                . "VALUES ("
                . "'".$this->FKGaleria."',"
                . "'".$this->caminhoFoto."')";
        
        $c = new Consulta($sql);
        
        if($c->executaConsulta()){
            return true;
        } else {
            return false;
        }
    }
    
    public static function listarFoto($galeria) {
        $sql = "SELECT * FROM foto WHERE FK_galeria = '".$galeria."' ";
        
        $c = new Consulta($sql);
        
        $retorno = $c->executaConsulta();
        
        if(!empty($retorno) && $retorno->rowCount() > 0){
            return $retorno;
        } else {
            return NULL;
        }
    }

}
