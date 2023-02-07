<?php

use Schron\controller\PresentationController;
use Schron\controller\HomeController;
use Schron\controller\SobreController;
use Schron\controller\LoginController;
use Schron\controller\CadastroController;
use Schron\controller\TabelaController;
use Schron\controller\ConstructController;
use Schron\controller\UsuarioController;
use Schron\controller\HorarioController;

return [
    "/home" => HomeController::class,
    "/" => PresentationController::class,
    "/login" => LoginController::class,
    "/login/logar" => LoginController::class,
    "/login/deslog" => LoginController::class,
    "/sobre" => SobreController::class,
    "/construct" => ConstructController::class,
    "/cadastro/ensino" => CadastroController::class,
    "/cadastro/ensino/add" => CadastroController::class,
    "/cadastro/professor" => CadastroController::class,
    "/cadastro/professor/add" => CadastroController::class,
    "/cadastro/turma" => CadastroController::class,
    "/cadastro/turma/add" => CadastroController::class,
    "/cadastro/disciplina" => CadastroController::class,
    "/cadastro/disciplina/add" => CadastroController::class,
    "/tabela/ensino" => TabelaController::class,
    "/tabela/ensino/edit" => TabelaController::class,
    "/tabela/ensino/update" => TabelaController::class,
    "/tabela/turma" => TabelaController::class,
    "/tabela/turma/edit" => TabelaController::class,
    "/tabela/turma/update" => TabelaController::class,
    "/tabela/turma/delete" => TabelaController::class,
    "/tabela/professor" => TabelaController::class,
    "/tabela/professor/edit" => TabelaController::class,
    "/tabela/professor/update" => TabelaController::class,
    "/tabela/professor/delete" => TabelaController::class,
    "/tabela/disciplina" => TabelaController::class,
    "/tabela/disciplina/edit" => TabelaController::class,
    "/tabela/disciplina/update" => TabelaController::class,
    "/tabela/disciplina/delete" => TabelaController::class,
    "/usuario/cadastro" => UsuarioController::class,
    "/usuario/add" => UsuarioController::class,
    "/horario" => HorarioController::class,
    "/horario/segunda" => HorarioController::class,
    "/horario/segunda/add" => HorarioController::class,
    "/horario/segunda/tabela" => HorarioController::class,
    "/horario/terca" => HorarioController::class,
    "/horario/terca/add" => HorarioController::class,
    "/horario/terca/tabela" => HorarioController::class,
    "/horario/quarta" => HorarioController::class,
    "/horario/quarta/add" => HorarioController::class,
    "/horario/quarta/tabela" => HorarioController::class,
    "/horario/quinta" => HorarioController::class,
    "/horario/quinta/add" => HorarioController::class,
    "/horario/quinta/tabela" => HorarioController::class,
    "/horario/sexta" => HorarioController::class,
    "/horario/sexta/add" => HorarioController::class,
    "/horario/sexta/tabela" => HorarioController::class,
];
