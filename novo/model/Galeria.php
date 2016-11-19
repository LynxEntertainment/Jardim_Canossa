<?php

@include_once '../Consulta.php';
@include_once 'Consulta.php';

class Galeria {

    private $idGaleria;
    private $tituloGaleria;
    private $descricaoGaleria;
    private $dataGaleria;
    private $idiomaGaleria;
    const idioma = array(
        "por" => 1,
        "eng" => 2,
        "ita" => 3
    );

    function __construct() {
        
    }

    function getIdGaleria() {
        return $this->idGaleria;
    }

    function getTituloGaleria() {
        return $this->tituloGaleria;
    }

    function getDescricaoGaleria() {
        return $this->descricaoGaleria;
    }

    function getDataGaleria() {
        return $this->dataGaleria;
    }

    function getIdiomaGaleria() {
        return $this->idiomaGaleria;
    }

    function setIdGaleria($idGaleria) {
        $this->idGaleria = $idGaleria;
    }

    function setTituloGaleria($tituloGaleria) {
        $this->tituloGaleria = $tituloGaleria;
    }

    function setDescricaoGaleria($descricaoGaleria) {
        $this->descricaoGaleria = $descricaoGaleria;
    }

    function setDataGaleria($dataGaleria) {
        $this->dataGaleria = $dataGaleria;
    }

    function setIdiomaGaleria($idiomaGaleria) {
        $this->idiomaGaleria = $idiomaGaleria;
    }
    
    public function selecionarGaleria(){
        $sql = "SELECT * FROM galeria_join "
                . "WHERE id_galeria = ".$this->idGaleria." "
                . "AND idioma_galeria = '".$this->idiomaGaleria."'";
        
        $c = new Consulta($sql);
        
        $retorno = $c->executaConsulta();
        
        if(!empty($retorno) && $retorno->rowCount()){
            return $retorno;
        } else {
            return NULL;
        }
    }
    
    private function getLastIdGaleria(){
        $sql = "SELECT id_galeria FROM galeria "
                . "ORDER BY id_galeria DESC "
                . "LIMIT 1";
        
        $c = new Consulta($sql);
        $result = $c->executaConsulta();
        
        if(!empty($result) && $result->rowCount()){
            foreach($result as $row){
                $this->idGaleria = $row['id_galeria'];
            }
        }
    }
    
    public function inserirGaleria(){
        $sql="INSERT INTO galeria(id_galeria) VALUES(NULL)";
        
        $c = new Consulta($sql);
                
        if($c->executaConsulta()){
            $this->getLastIdGaleria();
            return true;
        } else {
            return false;
        }
    }
    
    public function inserirGaleriaIdioma(){
        $sql = "INSERT INTO galeria_idioma("
                . "FK_galeria,"
                . "FK_idioma,"
                . "titulo_galeria,"
                . "descricao_galeria) "
                . "VALUES ("
                . "'".$this->idGaleria."',"
                . "'". Galeria::idioma[$this->idiomaGaleria]."',"
                . "'".$this->tituloGaleria."',"
                . "'".$this->descricaoGaleria."')";
        
        $c = new Consulta($sql);
        
        if($c->executaConsulta()){
            return true;
        } else {
            return false;
        }
    }
    
    public function editarGaleriaIdioma(){
        $sql = "UPDATE galeria_idioma "
                . "SET titulo_galeria = '".$this->tituloGaleria."', "
                . " descricao_galeria = '".$this->descricaoGaleria."' "
                . "WHERE FK_galeria = '".$this->idGaleria."' "
                . "AND FK_idioma = '".Galeria::idioma[$this->idiomaGaleria]."'";
        
        $c = new Consulta($sql);
        
        
        if($c->executaConsulta()){
            return true;
        } else {
            return false;
        }
    }
    
    public function excluirGaleria($id){
        $sql = "DELETE FROM galeria "
                . "WHERE id_galeria = '".$id."'";
        
        $c = new Consulta($sql);
        
        if($c->executaConsulta()){
            return true;
        }
    }

    public static function listarGalerias($idioma, $pagina, $qtd) {
        $sql = "SELECT * FROM galeria_join "
                . "WHERE idioma_galeria = '".$idioma."' "
                . "LIMIT ".($pagina-1)*$qtd.", ".$qtd."";
        $c = new Consulta($sql);

        $retorno = $c->executaConsulta();
        if (!empty($retorno) && $retorno->rowCount()) {
            return $retorno;
        } else {
            return NULL;
        }
    }

}
