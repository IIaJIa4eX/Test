<?php $v = $MODEL; 

?>

<div>
    <form method="POST" action="/admin/good/save_good">
        <input type="hidden" name="action" value="edit" />
        <input type="hidden" name="id" value="<?= $v["id"] ?>" />
        <!-- <input type="hidden" name="category_id" value="<?= $v["category_id"] ?>" /> -->
        <div class="form-group">
            <label for="imputkey">Наименование</label>
            <input value="<?= $v["name"] ?>" type="text" class="form-control" id="imputkey" name="name" placeholder="Введите Наименование товара">
        </div>
        <div class="form-group">
            <select name="category_id">
                        <option value="null" >нет категории</option>  
                        <?php foreach($MODEL["cats"] as $value): ?>
                            <option value="<?= $value["id"] ?>" <?php if ($value["id"] == $MODEL["category_id"]) echo("selected"); ?> ><?= $value["name"] ?></option> 
                        <?php endforeach; ?>
                        
            </select>
        </div>


        <div class="form-group">
            <label for="inputvalue">Описание</label>
            <?= $this->writeHTML(["name" => "description", "value" => $v["description"]], "shared", "editor") ?>
        </div>
        <table>

<?php foreach($MODEL["params"] as $value): ?>
<tr>
    <td><input name="params[name][]" value="<?= $value["name"] ?>" /></td>
    <td><input name="params[value][]" value="<?= $value["value"] ?>" /></td>
    <td>
        <button onclick="addLine(this); return false;">Add</button>
        <button onclick="removeLine(this); return false;">Remove</button>
    </td>
</tr>
<?php endforeach; ?>
<tr>
    <td><input name="params[name][]" value="" /></td>
    <td><input name="params[value][]" value="" /></td>
    <td>
        <button onclick="addLine(this); return false;">Add</button>
        <button onclick="removeLine(this); return false;">Remove</button>
    </td>
</tr>

</table>

        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>

    <?php if ($v["id"] != -1): ?>

    <p> 
        <?= $this->drawRoute("pic", "all", [
            "module" => "good",
            "id" => $v["id"]
        ]) ?> 
    </p>

    <p> 
        <?= $this->drawRoute("pic", "add", [
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

    <p> 
        <?= $this->drawRoute("comment", "add", [
            "module" => "good",
            "id" => $v["id"]
        ]) ?> 
    </p>

    <?php endif; ?>

</div>