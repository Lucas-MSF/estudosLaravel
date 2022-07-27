<?php

namespace Alura\Cursos\Controller;

class FormularioInsercao extends ControllerHtml implements InterfaceControladorRequisicao
{
    public function processaRequisicao():void
    {
       echo  $this->renderizaHtml('Cursos/formulario-novo-curso.php',['titulo'=> 'Novo Curso']);
        
    }
}
