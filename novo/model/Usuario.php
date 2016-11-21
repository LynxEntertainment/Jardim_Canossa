<?php

require_once 'Consulta.php';
require_once '../model/Consulta.php';

class Usuario {

    private $idUsuario;
    private $nomeUsuario;
    private $sobrenomeUsuario;
    private $loginUsuario;
    private $senhaUsuario;

    function __construct() {
        
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getNomeUsuario() {
        return $this->nomeUsuario;
    }

    function getSobrenomeUsuario() {
        return $this->sobrenomeUsuario;
    }

    function getLoginUsuario() {
        return $this->loginUsuario;
    }

    function getSenhaUsuario() {
        return $this->senhaUsuario;
    }

    function getIdiomaUsuario() {
        return $this->idiomaUsuario;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setNomeUsuario($nomeUsuario) {
        $this->nomeUsuario = $nomeUsuario;
    }

    function setSobrenomeUsuario($sobrenomeUsuario) {
        $this->sobrenomeUsuario = $sobrenomeUsuario;
    }

    function setLoginUsuario($loginUsuario) {
        $this->loginUsuario = $loginUsuario;
    }

    function setSenhaUsuario($senhaUsuario) {
        $this->senhaUsuario = $senhaUsuario;
    }

    function setIdiomaUsuario($idiomaUsuario) {
        $this->idiomaUsuario = $idiomaUsuario;
    }

    function editarUsuario($nome, $sobrenome, $senha) {
        $sql = "UPDATE usuario SET "
                . "nome_usuario =  ?,"
                . "sobrenome_usuario = ?,"
                . "WHERE id_usuario = ?";
        
        $dados = array($nome,$sobrenome,$this->idUsuario);

        $c = new Consulta($sql);

        if ($c->executaConsulta($dados)) {
            $this->nomeUsuario = $nome;
            $this->sobrenomeUsuario = $sobrenome;

            return true;
        } else {
            return false;
        }
    }

    public function alterarSenha($senha) {
        $sql = "UPDATE usuario SET "
                . "senha_usuario = ? "
                . "WHERE id_usuario = ?";

        $c = new Consulta($sql);
        
        $dados = array(md5($senha),$this->idUsuario);

        if ($c->executaConsulta($dados)) {
            return true;
        } else {
            return false;
        }
    }

    public function realizarLogin($login, $senha) {
        $sql = "SELECT * FROM usuario "
                . "WHERE login_usuario = ? "
                . "AND senha_usuario = ? ";

        $c = new Consulta($sql);
        
        $dados = array($login,md5($senha));

        $retorno = $c->executaConsulta($dados);

        if ($retorno->rowCount() > 0) {
            return $retorno;
        } else {
            return NULL;
        }
    }

}
