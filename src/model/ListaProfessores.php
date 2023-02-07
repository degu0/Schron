<?php

namespace Schron\model;

class ListaProfessores
{

    private $lista = [];

    public function __construct($listaProfessor)
    {
        $this->lista = $listaProfessor;
    }


    public function getTurmas($id)
    {
        $turmas = [];
        $resultado = "";
        foreach ($this->lista as $professor) {
            if ($id == $professor->getId() && !in_array($professor->getTurma(), $turmas)) {
                $resultado = $resultado . $professor->getTurma() . "<br>";
                $turmas[] = $professor->getTurma();
            }
        }
        return $resultado;
    }

    

    public function getProfessor($turma) 
    {
        $resultado = "";
        foreach ($this->lista as $disciplina) {
            if($turma == $disciplina->getTurma()) {
                $resultado = $resultado . $disciplina->getNome();
            }
        }
    }


    public function getDias($id)
    {
        $dias = [];
        $resultado = "";
        foreach ($this->lista as $professor) {
            if ($id == $professor->getId() && !in_array($professor->getDia(), $dias)) {
                $resultado = $resultado . $professor->getDia() . "<br>";
                $dias[] = $professor->getDia();
            }
        }
        return $resultado;
    }

    public function getLista()
    {
        $idsCadastrados = [];
        $resultado = [];

        foreach ($this->lista as $professor) {
            if (!in_array($professor->getId(), $idsCadastrados)) {
                $resultado[] = $professor;
                $idsCadastrados[] = $professor->getId();
            }
        }
        return $resultado;
    }
}
