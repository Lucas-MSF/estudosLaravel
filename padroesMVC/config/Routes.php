<?php

use Alura\Cursos\Controller\{
    Alterar,
    Exclusao,
    FormularioInsercao,
    FormularioLogin,
    ListarCursos,
    Persistencia,
    RealizaLogin
};


return [
    '/listar-cursos' => ListarCursos::class,
    '/novo-curso' => FormularioInsercao::class,
    '/salvar-curso' => Persistencia::class,
    '/excluir-curso' => Exclusao::class,
    '/alterar-curso' => Alterar::class,
    '/login' => FormularioLogin::class,
    '/realiza-login' => RealizaLogin::class
];
