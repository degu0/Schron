<?php

namespace Schron\model;

class Ensino
{
    private $id;
    private $Ensino;
    private $Aula;

    public function __construct($Ensino, $Aula, $id = null)
    {
        $this->Ensino = $Ensino;
        $this->Aula = $Aula;
        $this->id = $id;
    }


    public function getEnsino()
    {
        return $this->Ensino;
    }

    public function getAula()
    {
        return $this->Aula;
    }

    public function getId()
    {
        return $this->id;
    }
}
