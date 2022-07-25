<?php 

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\ORM\EntityManager;

class Persistencia implements InterfaceControladorRequisicao
{
    
    private $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
    }

    public function processaRequisicao(): void
    {
        $descricao= strip_tags($_POST['descricao']);
        $curso= new Curso();
        $curso->setDescricao($descricao);
        $id= filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if(!is_null($id) || $id===false){
            $curso = $this->entityManager->find(Curso::class, $id);
            $curso->setDescricao($descricao);
            
        }else{
            $curso= new Curso();
            $curso->setDescricao($descricao);
            $this->entityManager->persist($curso);
    
        }
        $this->entityManager->flush();
        header('Location: /listar-cursos', true, 302);
    }
    
}