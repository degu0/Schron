<?php

namespace Schron\model\BD;

use Schron\model\BD\Conexao;
use Schron\model\Disciplina;


class DisciplinaBD
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    public function getLista()
    {
        $comando = "SELECT d.id, d.Nome , CONCAT(Serie,' ', Curso, ' ', turma) AS Turma, p.Nome AS Professor, d.Quantidade_Aulas, d.Duplicidade
        FROM disciplina_turma_Professor d INNER JOIN Turma t ON t.id = d.FK_id_Turma
        INNER JOIN Professor p ON p.id = d.FK_id_Professor
        ORDER BY d.nome; ";

        $resultado = $this->conexao->mysqli->query($comando);
        if ($resultado == false) {
            return null;
        }
        $listaDisciplina = [];

        while ($linha = $resultado->fetch_assoc()) {
            $listaDisciplina[] = new Disciplina($linha["Nome"], null, null,  $linha["Turma"], $linha["Professor"], $linha["Quantidade_Aulas"], $linha["Duplicidade"], $linha["id"]);
        }

        $this->conexao->fecharConexao();
        return $listaDisciplina;
    }

    public function getDisciplinaProfessor()
    {
        $comando = "SELECT d.id, CONCAT(d.Nome, '|', p.Nome) as Nome_Disciplina_Professor
        FROM disciplina_turma_Professor d INNER JOIN Professor p ON p.id = d.FK_id_Professor
        ORDER BY d.nome; ";

        $resultado = $this->conexao->mysqli->query($comando);
        if ($resultado == false) {
            return null;
        }
        $listaDisciplina = [];

        while ($linha = $resultado->fetch_assoc()) {
            $listaDisciplina[] = new Disciplina($linha["Nome_Disciplina_Professor"], null, null,  null, null, null, $linha["id"]);
        }

        $this->conexao->fecharConexao();
        return $listaDisciplina;
    }

    public function atualizar(Disciplina $DisciplinaAtualizado)
    {
        $comando = "UPDATE disciplina_turma_Professor SET Nome = upper(?), FK_id_Turma = ?, FK_id_Professor = ?, Quantidade_Aulas = ?, Duplicidade = ? WHERE id = ?;";

        $id = $DisciplinaAtualizado->getId();
        $Nome = $DisciplinaAtualizado->getNome();
        $Turma = $DisciplinaAtualizado->getTurma();
        $Professor = $DisciplinaAtualizado->getProfessor();
        $Quantidade = $DisciplinaAtualizado->getQuantidade();
        $Duplicidade = $DisciplinaAtualizado->getDuplicidade();

        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param(
            "siiisi",
            $Nome,
            $Turma,
            $Professor,
            $Quantidade,
            $Duplicidade,
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
        $comando = "DELETE FROM disciplina_turma_Professor WHERE id = ?;";

        $preparacao = $this->conexao->mysqli->prepare($comando);

        $preparacao->bind_param("s", $id);
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        if ($resultado == false) {
            return null;
        }

        $this->conexao->fecharConexao();
    }

    public function adicionar(Disciplina $Disciplina)
    {
        $comando = "INSERT INTO disciplina_turma_Professor (Nome, FK_id_Turma, FK_id_Professor, Quantidade_Aulas, Duplicidade) VALUES(upper(?), ?, ?, ?, ?);";
        $Nome = $Disciplina->getNome();
        $Turma = $Disciplina->getTurma();
        $Professor = $Disciplina->getProfessor();
        $Quantidade = $Disciplina->getQuantidade();
        $Duplicidade = $Disciplina->getDuplicidade();


        $preparacao = $this->conexao->mysqli->prepare($comando);

        $preparacao->bind_param(
            "siiis",
            $Nome,
            $Turma,
            $Professor,
            $Quantidade,
            $Duplicidade,
        );

        $preparacao->execute();

        $resultado = $preparacao->get_result();

        if ($resultado == false) {
            return null;
        }

        $this->conexao->fecharConexao();
    }

    public function getDisciplina($id)
    {
        $comando = "SELECT * FROM disciplina_turma_Professor WHERE id = ?;";

        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param("i", $id);
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        if ($resultado == false) {
            return null;
        }

        $linha = $resultado->fetch_assoc();
        $Disciplina = new Disciplina($linha["Nome"], null, null,  $linha["FK_id_Turma"], $linha["FK_id_Professor"], $linha["Quantidade_Aulas"], null, $linha["id"]);
        $this->conexao->fecharConexao();
        return $Disciplina;
    }
    public function getBooleano()
    {
        $comando = "SELECT id FROM disciplina_turma_professor;";
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

    public function adicionarHorario($disciplina, $horario, $dia, $countTurma, $countAula)
    {
        $comando = "INSERT INTO horario (horario_inicio, horario_fim, Dias, FK_id_Disciplina) values (? , ?, ? , ?);";
        $count = 0;
        $countHorario = 0;
        $countElemento = 0;

        while ($count != count($disciplina)) {
            $idDisciplina = $disciplina[$count][4];
            if ($countElemento == $countTurma) {
                $countHorario++;
                $countElemento = 0;
            }
            $horarioInicio = $horario[$countHorario];
            $horarioFinal = $horario[($countHorario + $countAula)];
            $preparacao = $this->conexao->mysqli->prepare($comando);


            $preparacao->bind_param(
                "sssi",
                $horarioInicio,
                $horarioFinal,
                $dia,
                $idDisciplina
            );

            $preparacao->execute();

            $resultado = $preparacao->get_result();
            $count++;
            $countElemento++;
        }
        if ($resultado == false) {
            return null;
        }

        $this->conexao->fecharConexao();
    }
//horario
    public function getHorarioSegunda()
    {
        $comando = "SELECT h.id, h.horario_inicio, h.horario_fim, h.Dias, CONCAT(dtp.Nome, '|', p.Nome)
        as Nome_Disciplina_Professor,CONCAT(t.Serie,' ', t.Curso, ' ', t.turma) AS TurmaCompleta FROM horario h
        left join disciplina_turma_professor dtp
        on dtp.id = h.FK_id_Disciplina
        left join professor p
        on p.id = dtp.FK_id_Professor
        left join turma t
        on t.id = dtp.FK_id_Turma
        WHERE Dias = 'Segunda';";

        $resultado = $this->conexao->mysqli->query($comando);
        if ($resultado == false) {
            return null;
        }
        $listaDisciplina = [];

        while ($linha = $resultado->fetch_assoc()) {
            $listaDisciplina[] = new Disciplina($linha["Nome_Disciplina_Professor"], $linha["horario_inicio"], $linha["horario_fim"],  $linha["TurmaCompleta"], $linha["Dias"], null, $linha["id"]);
        }

        $this->conexao->fecharConexao();
        return $listaDisciplina;
    }
    public function getHorarioTerca()
    {
        $comando = "SELECT h.id, h.horario_inicio, h.horario_fim, h.Dias, CONCAT(dtp.Nome, '|', p.Nome) as Nome_Disciplina_Professor FROM horario h
        left join disciplina_turma_professor dtp
        on dtp.id = h.FK_id_Disciplina
        left join professor p
        on p.id = dtp.FK_id_Professor
        WHERE Dias = 'Terça';";

        $resultado = $this->conexao->mysqli->query($comando);
        if ($resultado == false) {
            return null;
        }
        $listaDisciplina = [];

        while ($linha = $resultado->fetch_assoc()) {
            $listaDisciplina[] = new Disciplina($linha["Nome_Disciplina_Professor"], $linha["horario_inicio"], $linha["horario_fim"],  $linha["Dias"], null, null, $linha["id"]);
        }

        $this->conexao->fecharConexao();
        return $listaDisciplina;
    }
    public function getHorarioQuarta()
    {
        $comando = "SELECT h.id, h.horario_inicio, h.horario_fim, h.Dias, CONCAT(dtp.Nome, '|', p.Nome) as Nome_Disciplina_Professor FROM horario h
        left join disciplina_turma_professor dtp
        on dtp.id = h.FK_id_Disciplina
        left join professor p
        on p.id = dtp.FK_id_Professor
        WHERE Dias = 'Quarta';";

        $resultado = $this->conexao->mysqli->query($comando);
        if ($resultado == false) {
            return null;
        }
        $listaDisciplina = [];

        while ($linha = $resultado->fetch_assoc()) {
            $listaDisciplina[] = new Disciplina($linha["Nome_Disciplina_Professor"], $linha["horario_inicio"], $linha["horario_fim"],  $linha["Dias"], null, null, $linha["id"]);
        }

        $this->conexao->fecharConexao();
        return $listaDisciplina;
    }
    public function getHorarioQuinta()
    {
        $comando = "SELECT h.id, h.horario_inicio, h.horario_fim, h.Dias, CONCAT(dtp.Nome, '|', p.Nome) as Nome_Disciplina_Professor FROM horario h
        left join disciplina_turma_professor dtp
        on dtp.id = h.FK_id_Disciplina
        left join professor p
        on p.id = dtp.FK_id_Professor
        WHERE Dias = 'Quinta';";

        $resultado = $this->conexao->mysqli->query($comando);
        if ($resultado == false) {
            return null;
        }
        $listaDisciplina = [];

        while ($linha = $resultado->fetch_assoc()) {
            $listaDisciplina[] = new Disciplina($linha["Nome_Disciplina_Professor"], $linha["horario_inicio"], $linha["horario_fim"],  $linha["Dias"], null, null, $linha["id"]);
        }

        $this->conexao->fecharConexao();
        return $listaDisciplina;
    }
    public function getHorarioSexta()
    {
        $comando = "SELECT h.id, h.horario_inicio, h.horario_fim, h.Dias, CONCAT(dtp.Nome, '|', p.Nome) as Nome_Disciplina_Professor FROM horario h
        left join disciplina_turma_professor dtp
        on dtp.id = h.FK_id_Disciplina
        left join professor p
        on p.id = dtp.FK_id_Professor
        WHERE Dias = 'Sexta';";

        $resultado = $this->conexao->mysqli->query($comando);
        if ($resultado == false) {
            return null;
        }
        $listaDisciplina = [];

        while ($linha = $resultado->fetch_assoc()) {
            $listaDisciplina[] = new Disciplina($linha["Nome_Disciplina_Professor"], $linha["horario_inicio"], $linha["horario_fim"],  $linha["Dias"], null, null, $linha["id"]);
        }

        $this->conexao->fecharConexao();
        return $listaDisciplina;
    }

//getDias
    public function getSegunda()
    {
        $comando = "SELECT 
    dtp.id, CONCAT(dtp.Nome, '|', p.Nome) as Disciplina,CONCAT(t.Serie, ' ', t.Curso, ' ',t.turma) as Turma, dtp.Duplicidade
    from disciplina_turma_professor dtp
    left join turma t 
    on t.id = dtp.FK_id_turma
    left join professor p
    on p.id = dtp.FK_id_Professor
    left join Professor_Dias pd ON p.id = pd.FK_id_Professor
    left join Dia d on d.id = pd.FK_id_Dias where d.Dias = 'Segunda';";

        $resultado = $this->conexao->mysqli->query($comando);
        if ($resultado == false) {
            return null;
        }
        $listaDisciplina = [];

        while ($linha = $resultado->fetch_assoc()) {
            $listaDisciplina[] = new Disciplina($linha["Disciplina"], null, null, $linha["Turma"], null, null, $linha["Duplicidade"], $linha["id"]);
        }

        $this->conexao->fecharConexao();
        return $listaDisciplina;
    }

    public function getTerca()
    {
        $comando = "SELECT 
        dtp.id, CONCAT(dtp.Nome, '|', p.Nome) as Disciplina,CONCAT(t.Serie, ' ', t.Curso, ' ',t.turma) as Turma, dtp.Duplicidade
        from disciplina_turma_professor dtp
        left join turma t 
        on t.id = dtp.FK_id_turma
        left join professor p
        on p.id = dtp.FK_id_Professor
        left join Professor_Dias pd ON p.id = pd.FK_id_Professor
    left join Dia d on d.id = pd.FK_id_Dias where d.Dias = 'Terca';";

        $resultado = $this->conexao->mysqli->query($comando);
        if ($resultado == false) {
            return null;
        }
        $listaDisciplina = [];

        while ($linha = $resultado->fetch_assoc()) {
            $listaDisciplina[] = new Disciplina($linha["Disciplina"], null, null, $linha["Turma"], null, null, $linha["Duplicidade"], $linha["id"]);
        }

        $this->conexao->fecharConexao();
        return $listaDisciplina;
    }

    public function getQuarta()
    {
        $comando = "SELECT 
        dtp.id, CONCAT(dtp.Nome, '|', p.Nome) as Disciplina,CONCAT(t.Serie, ' ', t.Curso, ' ',t.turma) as Turma, dtp.Duplicidade
        from disciplina_turma_professor dtp
        left join turma t 
        on t.id = dtp.FK_id_turma
        left join professor p
        on p.id = dtp.FK_id_Professor
        left join Professor_Dias pd ON p.id = pd.FK_id_Professor
    left join Dia d on d.id = pd.FK_id_Dias where d.Dias = 'Quarta';";

        $resultado = $this->conexao->mysqli->query($comando);
        if ($resultado == false) {
            return null;
        }
        $listaDisciplina = [];

        while ($linha = $resultado->fetch_assoc()) {
            $listaDisciplina[] = new Disciplina($linha["Disciplina"], null, null, $linha["Turma"], null, null, $linha["Duplicidade"], $linha["id"]);
        }

        $this->conexao->fecharConexao();
        return $listaDisciplina;
    }

    public function getQuinta()
    {
        $comando = "SELECT 
        dtp.id, CONCAT(dtp.Nome, '|', p.Nome) as Disciplina,CONCAT(t.Serie, ' ', t.Curso, ' ',t.turma) as Turma, dtp.Duplicidade
        from disciplina_turma_professor dtp
        left join turma t 
        on t.id = dtp.FK_id_turma
        left join professor p
        on p.id = dtp.FK_id_Professor
        left join Professor_Dias pd ON p.id = pd.FK_id_Professor
    left join Dia d on d.id = pd.FK_id_Dias where d.Dias = 'Quinta';";

        $resultado = $this->conexao->mysqli->query($comando);
        if ($resultado == false) {
            return null;
        }
        $listaDisciplina = [];

        while ($linha = $resultado->fetch_assoc()) {
            $listaDisciplina[] = new Disciplina($linha["Disciplina"], null, null, $linha["Turma"], null, null, $linha["Duplicidade"], $linha["id"]);
        }

        $this->conexao->fecharConexao();
        return $listaDisciplina;
    }

    public function getSexta()
    {
        $comando = "SELECT 
        dtp.id, CONCAT(dtp.Nome, '|', p.Nome) as Disciplina,CONCAT(t.Serie, ' ', t.Curso, ' ',t.turma) as Turma, dtp.Duplicidade
        from disciplina_turma_professor dtp
        left join turma t 
        on t.id = dtp.FK_id_turma
        left join professor p
        on p.id = dtp.FK_id_Professor
        left join Professor_Dias pd ON p.id = pd.FK_id_Professor
    left join Dia d on d.id = pd.FK_id_Dias where d.Dias = 'Sexta';";

        $resultado = $this->conexao->mysqli->query($comando);
        if ($resultado == false) {
            return null;
        }
        $listaDisciplina = [];

        while ($linha = $resultado->fetch_assoc()) {
            $listaDisciplina[] = new Disciplina($linha["Disciplina"], null, null, $linha["Turma"], null, null, $linha["Duplicidade"], $linha["id"]);
        }

        $this->conexao->fecharConexao();
        return $listaDisciplina;
    }
}
