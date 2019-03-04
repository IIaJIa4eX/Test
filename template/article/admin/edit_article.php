<?php $v = $MODEL; 

?>

<div>
    <form method="POST" action="/admin/article/save_article">
        <input type="hidden" name="action" value="edit" />
        <input type="hidden" name="id" value="<?= $v["id"] ?>" />
        <input type="hidden" name="category_id" value="<?= $v["category_id"] ?>" />
        <div class="form-group">
            <label for="imputkey">Наименование</label>
            <input value="<?= $v["name"] ?>" type="text" class="form-control" id="imputkey" name="name" placeholder="Введите Наименование article">
        </div>
        <div class="form-group">
            <label for="imputkey">Короткий текст short_text</label>
            <?= $this->writeHTML(["name" => "short_text", "value" => $v["short_text"]], "shared", "editor") ?>
        </div>
        <div class="form-group">
            <label for="imputkey"> Текст text</label>
            <?= $this->writeHTML(["name" => "text", "value" => $v["text"]], "shared", "editor") ?>            
        </div>

        <table>

</table>

        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>

</div>