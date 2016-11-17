<?php

require_once 'Consulta.php';
require_once 'model/Consulta.php';

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
                . "nome_usuario = '" . $nome . "',"
                . "sobrenome_usuario = '" . $sobrenome . "',"
                . "WHERE id_usuario = '" . $this->idUsuario . "'";

        $c = new Consulta($sql);

        if ($c->executaConsulta()) {
            $this->nomeUsuario = $nome;
            $this->sobrenomeUsuario = $sobrenome;

            return true;
        } else {
            return false;
        }
    }

    public function alterarSenha($senha) {
        $sql = "UPDATE usuario SET "
                . "senha_usuario = '" . md5($senha) . "'"
                . "WHERE id_usuario = '" . $this->idUsuario . "'";

        $c = new Consulta($sql);

        if ($c->executaConsulta()) {
            return true;
        } else {
            return false;
        }
    }

    public function realizarLogin($login, $senha) {
        $sql = "SELECT * FROM usuario "
                . "WHERE login_usuario = '" . $login . "' "
                . "AND senha_usuario = '" . md5($senha) . "'";

        $c = new Consulta($sql);

        $retorno = $c->executaConsulta();

        if ($retorno->rowCount() > 0) {
            return $retorno;
        } else {
            return NULL;
        }
    }

}
