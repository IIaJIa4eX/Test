<div class="but">
    <a href="/admin/article/edit_cat/?parent_id=<?= $MODEL["parent"] ?>" class="btn btn-primary">Создать категорию</a>
</div>

<?php foreach ($MODEL["elements"] as $v): ?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title"><?= $v["name"] ?> </h5>
        <p class="card-text"><?= $v["description"] ?></p>
        <p class="card-text"><?= $v["url"] ?></p>
        <a href="/admin/article/edit_cat/<?= $v["id"] ?>" class="btn btn-primary">Редактировать</a>
        <a href="/admin/article/show_articles/<?= $v["name"] ?>" class="btn btn-primary">Элементы</a>

        <div class="subs">
            <?=
                $this->WriteHTML(
                    [
                        "elements" => $v["subs"],
                        "parent" => $v["id"]
                    ],
                    "article/admin",
                    "all_cats"
                )
            ?>
        </div>

    </div>
</div>
<?php endforeach; ?>