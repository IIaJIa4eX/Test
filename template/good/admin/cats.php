<div class="but">
                    <form method="GET" action="/admin_good/edit_cat">
                        <input type="submit" value="Создать" />
                    </form>    
                    <a href="/admin/good/edit_cat/<?= $v["id"] ?>" class="btn btn-primary">Создать категорию</a>
</div>

<?php foreach ($MODEL as $v): ?>
<div class="card">
    <div class="card-body">
        
        <h5 class="card-title"><?= $v["name"] ?> </h5>
        <p class="card-text"><?= $v["description"] ?></p>
        <a href="/admin/good/edit_cat/<?= $v["id"] ?>" class="btn btn-primary">Редактировать</a>
        <a href="/admin/good/show_good/<?= $v["id"] ?>" class="btn btn-primary">Товары</a>
    </div>
</div>
<?php endforeach; ?>