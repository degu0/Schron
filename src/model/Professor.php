<?php

namespace Schron\model;

class Professor
{
    private $id;
    private $Nome;
    private $Cor;
    private $Carga;
    private $Dia;
    private $Turma;

    public function __construct($Nome, $Cor, $Carga, $Turma = null, $Dia = null, $id = null)
    {   
        $this->Nome = $Nome;
        $this->Cor = $Cor;
        $this->Carga = $Carga;
        $this->Turma = $Turma;
        $this->Dia = $Dia;
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->Nome;
    }

    public function getCor()
    {
        return $this->Cor;
    }


    public function getCarga()
    {
        return $this->Carga;
    }

    public function getTurma()
    {
        return $this->Turma;
    }

    public function getDia()
    {
        return $this->Dia;
    }

}
