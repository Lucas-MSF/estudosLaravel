<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php if (isset($_SESSION['logado'])) : ?>
        <nv class="navbar navbar dark bg-dark mb-2">
            <a class="navbar-brand" style="color:white" href="/listar-cursos">Home</a>

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" style="color:white" aria-current="page" href="/logout">Sair</a>
                </li>
            </ul>
        </nv>
    <?php endif; ?>

    <div class="container">
        <div class="jumbotron mb-2">
            <h1><?= $titulo ?></h1>
        </div>
        <div class="alert alert-<?= $_SESSION['tipo_mensagem'] ?>">
            <?= $_SESSION['mensagem'] ?>
        </div>
        <?php 
        unset($_SESSION['tipo_mensagem']);
        unset($_SESSION['mensagem']);
        ?>
        