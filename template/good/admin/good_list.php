<?php foreach ($MODEL as $v): ?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title"><?= $v["name"] ?> </h5>
        <p class="card-text"><?= $v["description"] ?></p>
        <a href="/admin/good/edit_cat/<?= $v["id"] ?>" class="btn btn-primary">Редактировать</a>
    </div>
</div>
<?php endforeach; ?>