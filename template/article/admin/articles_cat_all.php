<div class="but">
                    <form method="GET" action="/admin_article/edit_cat">
                        <input type="submit" value="Создать" />
                    </form>    
                    <a href="/admin/article/edit_cat/<?= $v["id"] ?>" class="btn btn-primary">Создать категорию</a>
</div>

<?php foreach ($MODEL as $v): ?>

<div class="card">

    <div class="card-body">
        
        <h5 class="card-title"><?= $v["name"] ?> </h5>
        <p class="card-text"><?= $v["description"] ?></p>
        <a href="/admin/article/edit_cat/<?= $v["id"] ?>" class="btn btn-primary">Редактировать</a>
        <a href="/admin/article/show_articles/<?= $v["id"] ?>" class="btn btn-primary">Статьи</a>

    </div>

</div>

<?php endforeach; ?>