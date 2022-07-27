<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Infra\EntityManagerCreator;
use Alura\Cursos\Entity\Curso;

class ListarCursos extends ControllerHtml implements InterfaceControladorRequisicao
{

    private $repositorioDeCursos;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositorioDeCursos = $entityManager->getRepository(Curso::class);
    }

    public function processaRequisicao(): void
    {

      echo  $this->renderizaHtml('Cursos/listar-cursos.php',['titulo'=>'Lista de Cursos', 'cursos'=>$this->repositorioDeCursos->findAll()]);
        

    }
}
