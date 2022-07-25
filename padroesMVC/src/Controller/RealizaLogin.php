<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\ORM\EntityManager;
use Alura\Cursos\Entity\Usuario;

class RealizaLogin implements InterfaceControladorRequisicao
{

    private $repositorioUsuario;

    public function __construct()
    {
        $entityManager=(new EntityManagerCreator())->getEntityManager();
        $this->repositorioUsuario= $entityManager->getRepository(Usuario::class);
    }

    public function processaRequisicao(): void
    {
        $email= filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
        if(is_null($email) || $email===false )
        {
            echo "E-mail inválido";
            return;

        }
        $senha= filter_input(INPUT_POST,'senha');

        /** @var Usuario $usuario */
        $usuario = $this->repositorioUsuario->findOneBy(['email'=> $email]);
        
        if(is_null($usuario) || !$usuario->senhaEstaCorreta($senha)){
            echo "E-mail ou senha invalidos!";
            return;
        }

        header('Location: /listar-cursos');
    }
}