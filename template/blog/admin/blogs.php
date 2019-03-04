<?php foreach ($MODEL as $v): ?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title"><?= $v["header"] ?> ( <?= $v["create_date"] ?> )</h5>
        <p class="card-text"><?= $v["text"] ?></p>
        <a href="/admin/blog/edit/<?= $v["id"] ?>" class="btn btn-primary">Редактировать</a>
    </div>
</div>
<?php endforeach; ?>