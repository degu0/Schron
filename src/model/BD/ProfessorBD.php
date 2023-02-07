<?php

namespace Schron\model\BD;

use Schron\model\BD\Conexao;
use Schron\model\Professor;


class ProfessorBD
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    public function getListaProfessor()
    {
        $comando = "SELECT * FROM Professor";
        $resultado = $this->conexao->mysqli->query($comando);
        if ($resultado == false) {
            return null;
        }
        $listaProfessor = [];

        while ($linha = $resultado->fetch_assoc()) {
            $listaProfessor[] = new Professor($linha["Nome"], $linha["Cor"], $linha["Carga"], null, null, $linha["id"]);
        }

        $this->conexao->fecharConexao();
        return $listaProfessor;
    }

    public function getLista()
    {
        $comando = "SELECT p.id, p.Nome, p.Cor, p.Carga, d.Dias FROM Professor p 
        left join Professor_Dias pd ON p.id = pd.FK_id_Professor
        left join Dia d on d.id = pd.FK_id_Dias;";

        $resultado = $this->conexao->mysqli->query($comando);
        if ($resultado == false) {
            return null;
        }
        $listaProfessor = [];
        while ($linha = $resultado->fetch_assoc()) {
            $listaProfessor[] = new Professor($linha["Nome"], $linha["Cor"], $linha["Carga"], null, $linha['Dias'], $linha["id"]);
        }

        $this->conexao->fecharConexao();
        return $listaProfessor;
    }


    //Dias(possivelmente ficar no HorarioBD)
    public function getSegunda()
    {
        $comando = "SELECT p.Cor, CONCAT(dp.Nome, ' | ', p.Nome) AS disciplina_professor, d.Dias FROM Professor p
        JOIN Professor_Dias pd ON p.id = pd.FK_id_Professor
        JOIN Dia d ON d.id = pd.FK_id_Dias
        JOIN disciplina_turma_Professor dp ON p.id = dp.FK_id_Professor
        WHERE Dias LIKE 'Segunda';";

        $resultado = $this->conexao->mysqli->query($comando);
        if ($resultado == false) {
            return null;
        }
        $listaProfessor = [];

        while ($linha = $resultado->fetch_assoc()) {
            $listaProfessor[] = new Professor($linha["Nome"], $linha["Cor"], $linha["Carga"], $linha["Dias"], $linha["id"]);
        }

        $this->conexao->fecharConexao();
        return $listaProfessor;
    }
    public function getTerca()
    {
        $comando = "SELECT p.Cor, p.Nome, p.Carga, d.Dias from Professor p
        join Professor_Dias pd on p.id = pd.FK_id_Professor
        join Dia d on d.id = pd.FK_id_Dias
        where Dias like 'Terca';";

        $resultado = $this->conexao->mysqli->query($comando);
        if ($resultado == false) {
            return null;
        }
        $listaProfessor = [];

        while ($linha = $resultado->fetch_assoc()) {
            $listaProfessor[] = new Professor($linha["Nome"], $linha["Cor"], $linha["Carga"], $linha["Dias"], $linha["id"]);
        }

        $this->conexao->fecharConexao();
        return $listaProfessor;
    }
    public function getQuarta()
    {
        $comando = "SELECT p.Cor, p.Nome, p.Carga, d.Dias from Professor p
        join Professor_Dias pd on p.id = pd.FK_id_Professor
        join Dia d on d.id = pd.FK_id_Dias
        where Dias like 'Quarta';";

        $resultado = $this->conexao->mysqli->query($comando);
        if ($resultado == false) {
            return null;
        }
        $listaProfessor = [];

        while ($linha = $resultado->fetch_assoc()) {
            $listaProfessor[] = new Professor($linha["Nome"], $linha["Cor"], $linha["Carga"], $linha["Dias"], $linha["id"]);
        }

        $this->conexao->fecharConexao();
        return $listaProfessor;
    }
    public function getQuinta()
    {
        $comando = "SELECT p.Cor, p.Nome, p.Carga, d.Dias from Professor p
        join Professor_Dias pd on p.id = pd.FK_id_Professor
        join Dia d on d.id = pd.FK_id_Dias
        where Dias like 'Quinta';";

        $resultado = $this->conexao->mysqli->query($comando);
        if ($resultado == false) {
            return null;
        }
        $listaProfessor = [];

        while ($linha = $resultado->fetch_assoc()) {
            $listaProfessor[] = new Professor($linha["Nome"], $linha["Cor"], $linha["Carga"], $linha["Dias"], $linha["id"]);
        }

        $this->conexao->fecharConexao();
        return $listaProfessor;
    }
    public function getSexta()
    {
        $comando = "SELECT p.Cor, p.Nome, p.Carga, d.Dias from Professor p
        join Professor_Dias pd on p.id = pd.FK_id_Professor
        join Dia d on d.id = pd.FK_id_Dias
        where Dias like 'Sexta';";

        $resultado = $this->conexao->mysqli->query($comando);
        if ($resultado == false) {
            return null;
        }
        $listaProfessor = [];

        while ($linha = $resultado->fetch_assoc()) {
            $listaProfessor[] = new Professor($linha["Nome"], $linha["Cor"], $linha["Carga"], $linha["Dias"], $linha["id"]);
        }

        $this->conexao->fecharConexao();
        return $listaProfessor;
    }

    //
    public function atualizar(Professor $ProfessorAtualizado)
    {
        $comando = "UPDATE Professor SET Nome = ?, Cor = ?, Carga = ? WHERE id = ?;";

        $id = $ProfessorAtualizado->getId();
        $Nome = $ProfessorAtualizado->getNome();
        $Cor = $ProfessorAtualizado->getCor();
        $Carga = $ProfessorAtualizado->getCarga();

        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param(
            "ssii",
            $Nome,
            $Cor,
            $Carga,
            $id
        );
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        if ($resultado == false) {
            return null;
        }
        // $this->conexao->fecharConexao();
    }

    public function atualizarTurma($idProfessor, $Turma)
    {

        $comando = "UPDATE Professor_Turma  SET FK_id_Professor = ?, FK_id_Turma = ? WHERE FK_id_Professor = ?;";
        $preparacao = $this->conexao->mysqli->prepare($comando);
        $count = 0;
        while ($count != count($Turma)) {
            $idTurma = $Turma[$count];

            $preparacao->bind_param(
                "ii",
                $idProfessor,
                $idTurma
            );

            $preparacao->execute();

            $resultado = $preparacao->get_result();

            $count++;
        }
        if ($resultado == false) {
            return null;
        }
    }

    public function atualizarDia($idProfessor, $Dia)
    {
        $comando = "UPDATE Professor_Dias  SET FK_id_Professor = ?, FK_id_Dias = ? WHERE FK_id_Professor = ?;";
        $count = 0;
        while ($count != count($Dia)) {
            $idDia = $Dia[$count];
            $preparacao = $this->conexao->mysqli->prepare($comando);


            $preparacao->bind_param(
                "ii",
                $idProfessor,
                $idDia
            );

            $preparacao->execute();

            $resultado = $preparacao->get_result();

            $count++;
        }
        if ($resultado == false) {
            return null;
        }

        $this->conexao->fecharConexao();
    }

    public function remover($id)
    {
        $comando = "DELETE FROM Professor WHERE id = ?;";

        $preparacao = $this->conexao->mysqli->prepare($comando);

        $preparacao->bind_param("s", $id);
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        if ($resultado == false) {
            return null;
        }

        $this->conexao->fecharConexao();
    }

    public function adicionar(Professor $Professor)
    {

        $comando = "INSERT INTO Professor (Nome, Cor, Carga) VALUES(?, ?, ?);";
        $Nome = $Professor->getNome();
        $Cor = $Professor->getCor();
        $Carga = $Professor->getCarga();

        $preparacao = $this->conexao->mysqli->prepare($comando);

        $preparacao->bind_param(
            "ssi",
            $Nome,
            $Cor,
            $Carga
        );

        $preparacao->execute();

        $resultado = $preparacao->get_result();

        if ($resultado == false) {
            return null;
        }

    }
    public function cadastrarTurma($idProfessor, $Turma)
    {
        $comando = "INSERT INTO Professor_Turma (FK_id_Professor, FK_id_Turma) VALUES(?, ?);";
        $preparacao = $this->conexao->mysqli->prepare($comando);
        $count = 0;
        while ($count != count($Turma)) {
            $idTurma = $Turma[$count];

            $preparacao->bind_param(
                "ii",
                $idProfessor,
                $idTurma
            );

            $preparacao->execute();

            $resultado = $preparacao->get_result();

            $count++;
        }
        if ($resultado == false) {
            return null;
        }
    }

    public function cadastrarDia($idProfessor, $Dia)
    {
        $comando = "INSERT INTO Professor_Dias (FK_id_Professor, FK_id_Dias) VALUES(?, ?);";
        $count = 0;

        while ($count != count($Dia)) {
            $idDia = $Dia[$count];
            $preparacao = $this->conexao->mysqli->prepare($comando);


            $preparacao->bind_param(
                "ii",
                $idProfessor,
                $idDia
            );

            $preparacao->execute();

            $resultado = $preparacao->get_result();

            $count++;
        }
        if ($resultado == false) {
            return null;
        }

        $this->conexao->fecharConexao();
    }


    public function getProfessor($id)
    {
        $comando = "SELECT * FROM Professor WHERE id = ?;";

        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param("i", $id);
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        if ($resultado == false) {
            return null;
        }

        $linha = $resultado->fetch_assoc();
        $Professor = new Professor($linha["Nome"], $linha["Cor"], $linha["Carga"], null, null, $linha["id"]);
        // $this->conexao->fecharConexao();
        return $Professor;
    }

    public function getId()
    {
        $comando = "SELECT MAX(ID) AS id FROM Professor;";
        $resultado = $this->conexao->mysqli->query($comando);
        if ($resultado == false) {
            return null;
        }

        $linha = $resultado->fetch_assoc();
        return $linha["id"];
    }

    public function getTurma($id)
    {
        $comando = "SELECT * FROM professor_turma WHERE FK_id_Professor = ?;";

        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param("i", $id);
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        if ($resultado == false) {
            return null;
        }

        $linha = $resultado->fetch_assoc();
        $Professor = new Professor(null, null, null, $linha["FK_id_Turma"], null, $linha["FK_id_Professor"]);
        // $this->conexao->fecharConexao();
        return $Professor;
    }

    public function getDia($id)
    {
        $comando = "SELECT * FROM professor_dias WHERE FK_id_Professor = ?;";

        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param("i", $id);
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        if ($resultado == false) {
            return null;
        }

        $linha = $resultado->fetch_assoc();
        $Professor = new Professor(null, null, null, null, $linha["FK_id_Dias"], $linha["FK_id_Professor"]);

        $this->conexao->fecharConexao();
        return $Professor;
    }

    public function getBooleano()
    {
        $comando = "SELECT id FROM Professor;";
        $resultado = $this->conexao->mysqli->query($comando);
        if ($resultado == false) {
            return null;
        }
        $linha = $resultado->fetch_assoc();
        $this->conexao->fecharConexao();
        if($linha == null){
            return null;
        }else{
            return 1;
        }
    }


}
