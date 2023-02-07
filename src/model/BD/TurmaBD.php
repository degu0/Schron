<?php

namespace Schron\model\BD;

use Schron\model\BD\Conexao;
use Schron\model\Turma;


class TurmaBD
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    public function getQuantidadeTurmas()
    {
        $comando = "SELECT count(*) FROM Turma t";

        $resultado = $this->conexao->mysqli->query($comando);


        $linha = $resultado->fetch_array();

        return $linha[0];
    }

    public function getLista()
    {
        $comando = "SELECT T.id, t.Curso, t.Serie, e.Ensino, t.turma
        FROM Turma t INNER JOIN Ensino e ON e.id = t.FK_id_Ensino
        ORDER BY t.Serie; ";

        $resultado = $this->conexao->mysqli->query($comando);
        if ($resultado == false) {
            return null;
        }
        $listaTurma = [];

        while ($linha = $resultado->fetch_assoc()) {
            $listaTurma[] = new Turma($linha["Serie"], $linha["Ensino"], $linha["Curso"], $linha["turma"], $linha["id"]);
        }

        $this->conexao->fecharConexao();
        return $listaTurma;
    }

    public function getListaComplet()
    {
        $comando = "SELECT id, CONCAT(Serie,' ', Curso, ' ', turma) AS TurmaCompleta FROM Turma;";
        $resultado = $this->conexao->mysqli->query($comando);
        if ($resultado == false) {
            return null;
        }
        $listaTurma = [];

        while ($linha = $resultado->fetch_assoc()) {
            $listaTurma[] = new Turma($linha["TurmaCompleta"], null, null, null, $linha["id"]);
        }

        // $this->conexao->fecharConexao();
        return $listaTurma;
    }

    public function atualizar(Turma $TurmaAtualizado)
    {
        $comando = "UPDATE Turma SET Serie = ?, FK_id_Ensino= ?, Curso = upper(?), turma = upper(?) WHERE id = ?;";

        $id = $TurmaAtualizado->getId();
        $Serie = $TurmaAtualizado->getSerie();
        $Ensino = $TurmaAtualizado->getEnsino();
        $Curso = $TurmaAtualizado->getCurso();
        $Turma = $TurmaAtualizado->getTurma();


        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param(
            "sissi",
            $Serie,
            $Ensino,
            $Curso,
            $Turma,
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
        $comando = "DELETE FROM Turma WHERE id = ?;";

        $preparacao = $this->conexao->mysqli->prepare($comando);

        $preparacao->bind_param("s", $id);
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        if ($resultado == false) {
            return null;
        }

        $this->conexao->fecharConexao();
    }

    public function adicionar(Turma $Turma)
    {

        $comando = "INSERT INTO Turma (Serie, FK_id_Ensino, Curso, turma) VALUES(?, ?, upper(?), upper(?));";
        $Serie = $Turma->getSerie();
        $Ensino = $Turma->getEnsino();
        $Curso = $Turma->getCurso();
        $Turma = $Turma->getTurma();


        $preparacao = $this->conexao->mysqli->prepare($comando);

        $preparacao->bind_param(
            "siss",
            $Serie,
            $Ensino,
            $Curso,
            $Turma
        );

        $preparacao->execute();

        $resultado = $preparacao->get_result();

        if ($resultado == false) {
            return null;
        }

        $this->conexao->fecharConexao();
    }

    public function getTurma($id)
    {
        $comando = "SELECT * FROM Turma WHERE id = ?;";

        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param("i", $id);
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        if ($resultado == false) {
            return null;
        }

        $linha = $resultado->fetch_assoc();
        $Turma = new Turma($linha["Serie"], $linha["FK_id_Ensino"], $linha["Curso"], $linha["turma"], $linha["id"]);
        $this->conexao->fecharConexao();
        return $Turma;
    }

    public function getBooleano()
    {
        $comando = "SELECT id FROM Turma;";
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
