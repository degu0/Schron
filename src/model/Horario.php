<?php

namespace Schron\model;

class Horario
{
    private $listaErros = [];


    public function verificaChoqueHorarioProfessorPorDia($listaProfessores, $turma)
    {
        $countResultado = 0;
        $countElementosLinha = 0; 
        while ($countResultado < count($listaProfessores)) {
            $countTurma = 0;
            $countProximoElemento = $countResultado + 1; 
            if ($countElementosLinha != ($turma - 1)) {
                while ($countTurma != $turma && $countProximoElemento < count($listaProfessores)) {
                    if ($listaProfessores[$countResultado][2] != $listaProfessores[$countProximoElemento][2]) {
                        $this->verificaSeOProfessorEstaComAulasEmTurmasDifirerentes($listaProfessores[$countResultado], $listaProfessores[$countProximoElemento]);
                    } else {
                        $this->verificaSeOProfessorPodeTerAulasSeguidas($listaProfessores[$countResultado], $listaProfessores[$countProximoElemento]);
                    }

                    $countTurma++;
                    $countProximoElemento++;
                }
                $countElementosLinha++;
            } else {
                $countElementosLinha = 0;
            }
            $countResultado++;
        }

        if ($this->listaErros != null) {
            return $this->listaErros;
        }
    }

    private function verificaSeOProfessorPodeTerAulasSeguidas($listaAtual, $listaProximaTurma)
    {
        if ($listaAtual[1] == $listaProximaTurma[1]) {
            if ($listaAtual[3] == "Não") {
                $mensagemErro = "Erro no cadastro! Professor " . $listaAtual[1]
                    . " (na turma " . $listaAtual[2] . " ) e da sua disciplina " . $listaAtual[0] . ". Não tem duplicidade, não poderá ter duas seguidas.";
                $this->listaErros[] = $mensagemErro;
            }
        }
    }

    private function verificaSeOProfessorEstaComAulasEmTurmasDifirerentes($listaAtual, $listaProximaTurma)
    {
        //$listaProfessores[$countResultado][1]  $listaProfessores[$countTurma+1][1]
        if ($listaAtual[1]  == $listaProximaTurma[1]) {
            $mensagemErro = "Erro no cadastro! Professor " . $listaAtual[1]
                . " (na turma " . $listaAtual[2] . " de disciplina " . $listaAtual[0] . " ) comparado com a professor "
                . $listaProximaTurma[1] . " (na turma " . $listaProximaTurma[2] . " de disciplina " . $listaProximaTurma[0] . " ).";
            $this->listaErros[] = $mensagemErro;
        }
    }
}
