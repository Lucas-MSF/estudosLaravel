<?php 
namespace Alura\Cursos\Controller;

class Logout implements InterfaceControladorRequisicao
{
    public function processaRequisicao(): void
    {
        session_destroy();
        header('Location: /login');
    }
}