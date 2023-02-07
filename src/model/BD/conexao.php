<?php

namespace Schron\model\BD;

use mysqli;

class Conexao
{
    private $endereco = "127.0.0.1";
    private $login = "root";
    private $senha = "";
    private $banco = "Schron";

    public $mysqli;

    public function __construct()
    {
        $this->mysqli = new mysqli($this->endereco, $this->login, $this->senha, $this->banco);
    }

    public function __destruct()
    {
    }

    public function fecharConexao()
    {
        $this->mysqli->close();
        $this->__destruct();
    }
}
