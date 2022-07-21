
<?php include __DIR__.'/../inicio-html.php'; ?>

<form action="/salvar-curso" method="POST">
    <div class="form-group">
        <label for="descricao">Descrição</label>
        <input type="text" name="descricao" placeholder="Descição do curso" class="form-control">
    </div>
    <button class="btn btn-primary">Salvar</button>
</form>

<?php include __DIR__.'/../fim-html.php'; ?>
