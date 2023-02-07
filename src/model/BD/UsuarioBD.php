<?php

namespace Schron\model\BD;

use Schron\model\BD\Conexao;
use Schron\model\Usuario;

class UsuarioBD
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    public function adicionar(Usuario $usuario)
    {
        $comando = "INSERT INTO Usuario (login, senha, NomeInstituicao) VALUES(?, ?, ?);";
        $login = $usuario->getLogin();
        $senha = $usuario->getSenhaMd5();
        $instituto = $usuario->getInstituto();


        $preparacao = $this->conexao->mysqli->prepare($comando);

        $preparacao->bind_param(
            "sss",
            $login,
            $senha,
            $instituto
        );

        $preparacao->execute();

        $resultado = $preparacao->get_result();

        if ($resultado == false) {
            return null;
        }

        $this->conexao->fecharConexao();
    }

    public function getUsuario($id)
    {
        $comando = "SELECT * FROM usuario WHERE id = ?;";

        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param("d", $id);
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        if ($resultado == false) {
            return null;
        }

        $linha = $resultado->fetch_assoc();
        $usuario = new Usuario($linha["login"], $linha["senha"], null, $linha["id"]);
        $this->conexao->fecharConexao();
        return $usuario;
    }

    public function queryLogin($login, $senha)
    {
        $comando = "SELECT * from Usuario where login = ? and senha = ?;";
        $resultado = $this->conexao->mysqli->prepare($comando);
        $resultado->bind_param("ss", $login, $senha);
        $resultado->execute();

        $resultado2 = $resultado->get_result();

        $linha = $resultado2->fetch_assoc();
        if ($linha != null) {
            $user = new Usuario($linha["login"], $linha["senha"], $linha["id"]);
            return $user;
        }else {
            return null;
        }
    }

    public function queryInstituto($login, $senha)
    {
        $comando = "SELECT NomeInstituicao as instituto from Usuario where login = ? and senha = ?;";
        $resultado = $this->conexao->mysqli->prepare($comando);
        $resultado->bind_param("ss", $login, $senha);
        $resultado->execute();

        $resultado2 = $resultado->get_result();

        $linha = $resultado2->fetch_assoc();
        if ($linha != null) {
            return $linha["instituto"];
        }else {
            return null;
        }
    }
}
