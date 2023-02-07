<?php

namespace Schron\model;

class Turma
{
    private $id;
    private $Serie;
    private $Curso;
    private $Turma;
    private $Ensino;

    public function __construct($Serie, $Ensino, $Curso, $Turma,$id = null)
    {
        $this->Serie = $Serie;
        $this->Ensino = $Ensino;
        $this->Curso = $Curso;
        $this->Turma = $Turma;
        $this->id = $id;
    }


    public function getSerie()
    {
        return $this->Serie;
    }

    public function getEnsino()
    {
        return $this->Ensino;
    }

    public function getCurso()
    {
        return $this->Curso;
    }

    public function getTurma()
    {
        return $this->Turma;
    }

    public function getId()
    {
        return $this->id;
    }
    
}
