<?php

namespace Schron\model;

class Disciplina
{
    private $id;
    private $horarioInicio;
    private $horarioFim;
    private $Nome;
    private $Turma;
    private $Professor;
    private $Quantidade;
    private $Duplicidade;

    public function __construct($Nome, $horarioInicio, $horarioFim, $Turma, $Professor,$Quantidade,$Duplicidade, $id = null)
    {
        $this->horarioInicio = $horarioInicio;
        $this->horarioFim = $horarioFim;
        $this->Nome = $Nome;
        $this->Turma = $Turma;
        $this->Professor = $Professor;
        $this->Quantidade = $Quantidade;
        $this->Duplicidade = $Duplicidade;
        $this->id = $id;
    }


    public function getHorariroInicio()
    {
        return $this->horarioInicio;
    }

    public function getHorariroFim()
    {
        return $this->horarioFim;
    }

    public function getNome()
    {
        return $this->Nome;
    }

    public function getTurma()
    {
        return $this->Turma;
    }

    public function getProfessor()
    {
        return $this->Professor;
    }

    public function getQuantidade()
    {
        return $this->Quantidade;
    }

    public function getDuplicidade()
    {
        return $this->Duplicidade;
    }

    public function getId()
    {
        return $this->id;
    }
}
