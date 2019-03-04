<div>
    <form method="POST" action="/admin/statictext/save">
        <input type="hidden" name="action" value="edit" />
        <div class="form-group">
            <label for="imputkey">ключ</label>
            <input value="<?= $MODEL["key"] ?>" type="text" class="form-control" id="imputkey" name="key" placeholder="Введите ключ">
        </div>
        <div class="form-group">
            <label for="inputvalue">Значение</label>
            <?= $this->writeHTML(["name" => "value", "value" => $MODEL["value"]], "shared", "editor") ?>
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>    
</div>