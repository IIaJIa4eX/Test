<?php $v = $MODEL; ?>

<div>
    <form method="POST" action="/admin/blog/save">
        <input type="hidden" name="action" value="edit" />
        <input type="hidden" name="id" value="<?= $v["id"] ?>" />
        <input type="hidden" name="user" value="<?= $v["user"] ?>" />
        <div class="form-group">
            <label for="imputkey">Заголовок</label>
            <input value="<?= $v["header"] ?>" type="text" class="form-control" id="imputkey" name="header" placeholder="Введите заголовок">
        </div>
        <div class="form-group">
            <label for="inputvalue">Значение</label>
            <?= $this->writeHTML(["name" => "text", "value" => $v["text"]], "shared", "editor") ?>
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>    
</div>