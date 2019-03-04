<div class="but">
    <a href="/admin/wmenu/edit_cat/" class="btn btn-primary">Создать категорию</a>
</div>

<?php foreach ($MODEL as $v): ?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title"><?= $v["name"] ?> </h5>
        <p class="card-text"><?= $v["description"] ?></p>
        <a href="/admin/wmenu/edit_cat/<?= $v["id"] ?>" class="btn btn-primary">Редактировать</a>
        <a href="/admin/wmenu/show_items/<?= $v["name"] ?>" class="btn btn-primary">Элементы</a>
    </div>
</div>
<?php endforeach; ?>