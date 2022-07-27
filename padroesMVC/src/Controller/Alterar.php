<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Infra\EntityManagerCreator;
use Alura\Cursos\Entity\Curso;

class Alterar extends ControllerHtml  implements InterfaceControladorRequisicao
{

    private $repositorioCursos;

    public function __construct()
    {
        $entityManager= (new EntityManagerCreator())->getEntityManager();
        $this->repositorioCursos= $entityManager->getRepository(Curso::class);
    }

    public function processaRequisicao():void
    {
        $id= filter_input(INPUT_GET,'id', FILTER_VALIDATE_INT);
        if($id===false || is_null($id)){
            header('Location: /listar-cursos');
            return;
        }

        $curso=$this->repositorioCursos->find($id); 
        echo $this->renderizaHtml('Cursos/formulario-novo-curso.php', ['curso'=>$curso,'titulo' => 'Alterar curso: '. $curso->getDescricao()]);   

     
    }
}
