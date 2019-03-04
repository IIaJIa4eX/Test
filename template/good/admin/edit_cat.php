<?php $v = $MODEL; ?>

<div>
    <form method="POST" action="/admin/good/save_cat">
        <input type="hidden" name="action" value="edit" />
        <input type="hidden" name="id" value="<?= $v["id"] ?>" />
        <div class="form-group">
            <label for="imputkey">Наименование</label>
            <input value="<?= $v["name"] ?>" type="text" class="form-control" id="imputkey" name="name" placeholder="Введите Наименование категории">
        </div>
        <div class="form-group">
            <label for="inputvalue">Описание</label>
            <?= $this->writeHTML(["name" => "description", "value" => $v["description"]], "shared", "editor") ?>
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>    
</div>