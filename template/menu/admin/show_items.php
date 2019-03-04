<div class="but">
    <a href="/admin/wmenu/edit_item/?cat=<?= $MODEL["cat"] ?>" class="btn btn-primary">Создать товар</a>
</div>

<?php foreach ($MODEL["items"] as $v): ?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title"><?= $v["name"] ?> </h5>
        <p class="card-text"><?= $v["description"] ?></p>
        
        <a href="/admin/wmenu/edit_item/<?= $v["id"] ?>" class="btn btn-primary">Редактировать</a>
        <a href="/admin/wmenu/edit_item/?par_id=<?= $v["id"] ?>&cat=<?= $MODEL["cat"] ?>" class="btn btn-primary">добавить товар</a>

        <?php if (count($v["subs"]) > 0)
            echo $this->WriteHTML(
                [
                    "items" => $v["subs"],
                    "cat" => $MODEL["cat"]
                 ] , 
                "menu/admin", "show_items2"
            );
        ?> 
    </div>
</div>
<?php endforeach; ?>