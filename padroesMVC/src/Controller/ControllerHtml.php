<?php 

namespace Alura\Cursos\Controller;

abstract class ControllerHtml{

    public function renderizaHtml(string $caminhoTemplate, array $dados){
        extract($dados);
        ob_start();
        require __DIR__.'/../../View/'.$caminhoTemplate;
        $html = ob_get_clean();
        return $html;
    }
}