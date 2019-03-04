<div class="but">
                    <form method="GET" action="/admin/good/edit_good" >
                        <input type="hidden" name="cat" value="<?= $MODEL["cat"] ?>" />
                        <input type="submit" value="Создать" />
                    </form>    
                    <a href="/admin/good/edit_good/?cat=<?= $MODEL["cat"] ?>" class="btn btn-primary">Создать товар</a>
</div>

<?php foreach ($MODEL["goods"] as $v): ?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title"><?= $v["name"] ?> </h5>
        <p class="card-text"><?= $v["description"] ?></p>
        <p> 
            <?= $this->drawRoute("pic", "one", [
                "module" => "good",
                "id" => $v["id"]
            ]) ?> 
        </p>
        <p> 
            <?= $this->drawRoute("comment", "all", [
                "module" => "good",
                "id" => $v["id"]
            ]) ?> 
        </p>
        <a href="/admin/good/edit_good/<?= $v["id"] ?>" class="btn btn-primary">Редактировать</a>
    </div>
</div>
<?php endforeach; ?>