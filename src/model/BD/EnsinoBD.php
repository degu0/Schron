<?php

namespace Schron\model\BD;

use Schron\model\BD\Conexao;
use Schron\model\Ensino;


class EnsinoBD
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    public function getQuantidadeAulas()
    {
        $comando = "SELECT e.Aula FROM Ensino e;";
        $resultado = $this->conexao->mysqli->query($comando);
        if ($resultado == false) {
            return null;
        }

        $linha = $resultado->fetch_assoc();
        $this->conexao->fecharConexao();
        return $linha["Aula"];
    }

    public function getLista()
    {
        $comando = "SELECT * FROM Ensino;";
        $resultado = $this->conexao->mysqli->query($comando);
        if ($resultado == false) {
            return null;
        }
        $listaEnsino = [];

        while ($linha = $resultado->fetch_assoc()) {
            $listaEnsino[] = new Ensino($linha["Ensino"], $linha["Aula"], $linha["id"]);
        }

        $this->conexao->fecharConexao();
        return $listaEnsino;
    }

    public function atualizar(Ensino $EnsinoAtualizado)
    {
        $comando = "UPDATE Ensino SET Ensino = ?, Aula = ? WHERE id = ?;";

        $id = $EnsinoAtualizado->getId();
        $Ensino = $EnsinoAtualizado->getEnsino();
        $Aula = $EnsinoAtualizado->getAula();

        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param(
            "sii",
            $Ensino,
            $Aula,
            $id
        );
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        if ($resultado == false) {
            return null;
        }
        $this->conexao->fecharConexao();
    }

    public function remover($id)
    {
        $comando = "DELETE FROM Ensino WHERE id = ?;";

        $preparacao = $this->conexao->mysqli->prepare($comando);

        $preparacao->bind_param("s", $id);
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        if ($resultado == false) {
            return null;
        }

        $this->conexao->fecharConexao();
    }

    public function adicionar(Ensino $Ensino)
    {

        $comando = "INSERT INTO Ensino (Ensino, Aula) VALUES(?, ?);";
        $ensino = $Ensino->getEnsino();
        $aula = $Ensino->getAula();


        $preparacao = $this->conexao->mysqli->prepare($comando);

        $preparacao->bind_param(
            "si",
            $ensino,
            $aula
        );

        $preparacao->execute();

        $resultado = $preparacao->get_result();

        if ($resultado == false) {
            return null;
        }

        $this->conexao->fecharConexao();
    }

    public function adicionarDia($count)
    {

        if ($count == 0) {
            $dia = "Segunda";
        } else if ($count == 1) {
            $dia = "Terca";
        } else if ($count == 2) {
            $dia = "Quarta";
        } else if ($count == 3) {
            $dia = "Quinta";
        } else if ($count == 4) {
            $dia = "Sexta";
        }
        $comando = "INSERT INTO Dia (Dias) VALUES(?);";
        $preparacao = $this->conexao->mysqli->prepare($comando);

        $preparacao->bind_param(
            "s",
            $dia
        );

        $preparacao->execute();

        $resultado = $preparacao->get_result();

        if ($resultado == false) {
            return null;
        }

        $this->conexao->fecharConexao();
    }

    public function getEnsino($id)
    {
        $comando = "SELECT * FROM Ensino WHERE id = ?;";

        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param("i", $id);
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        if ($resultado == false) {
            return null;
        }

        $linha = $resultado->fetch_assoc();
        $Ensino = new Ensino($linha["Ensino"], $linha["Aula"], $linha["id"]);
        $this->conexao->fecharConexao();
        return $Ensino;
    }

    public function getBooleano()
    {
        $comando = "SELECT id FROM Ensino;";
        $resultado = $this->conexao->mysqli->query($comando);
        if ($resultado == false) {
            return null;
        }
        $linha = $resultado->fetch_assoc();
        $this->conexao->fecharConexao();
        if ($linha == null) {
            return null;
        } else {
            return 1;
        }
    }
}
