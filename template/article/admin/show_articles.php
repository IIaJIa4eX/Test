<div class="but">
    <a href="/admin/article/edit_article/?cat=<?= $MODEL["cat"] ?>" class="btn btn-primary">Создать article</a>
</div>

<?php foreach ($MODEL["articles"] as $v): ?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title"><?= $v["name"] ?>  (<?= $v["create_date"] ?> ) </h5>


        <p class="card-text"><?= $v["short_text"] ?></p>
        <p class="card-text"><?= $v["text"] ?></p>
        
        
        <a href="/admin/article/edit_article/<?= $v["id"] ?>" class="btn btn-primary">Редактировать</a>

        
    </div>
</div>
<?php endforeach; ?>