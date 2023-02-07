<?php

namespace Schron\model;

class Usuario
{

    private $id;
    private $login;
    private $senha;
    private $senhaMd5;
    private $instituto;

    public function __construct($login, $senhaMd5 = null, $senha = null, $instituto = null, $id = null)
    {
        $this->login = $login;
        $this->senha = $senha;
        $this->senhaMd5 = $senhaMd5;
        $this->instituto = $instituto;
        $this->id = $id;
    }

    public function getSenhaMd5()
    {
        if ($this->senhaMd5 == null) {
            $this->senhaMd5 = md5($this->senha);
        }
        return $this->senhaMd5;
    }

    public function getId()
    {
        return $this->id;
    }

    public function validarSenha($senha)
    {
        return $this->senhaMd5 == md5($senha);
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getInstituto()
    {
        return $this->instituto;
    }
}
