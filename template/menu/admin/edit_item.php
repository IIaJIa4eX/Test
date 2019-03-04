<?php $v = $MODEL; 

?>

<div>
    <form method="POST" action="/admin/wmenu/save_item">
        <input type="hidden" name="action" value="edit" />
        <input type="hidden" name="parent_id" value="<?= $v["parent_id"] ?>" />
        <input type="hidden" name="id" value="<?= $v["id"] ?>" />
        <input type="hidden" name="category_id" value="<?= $v["category_id"] ?>" />
        <div class="form-group">
            <label for="imputkey">Наименование</label>
            <input value="<?= $v["name"] ?>" type="text" class="form-control" id="imputkey" name="name" placeholder="Введите Наименование товара">
        </div>
        <div class="form-group">
            <label for="imputkey">URL</label>
            <input value="<?= $v["url"] ?>" type="text" class="form-control" id="imputkey" name="url" placeholder="Введите Наименование url">
        </div>
      <!--  <div class="form-group">
            <select name="category_id">
                        <option value="null" >нет категории</option>  
                        <?php foreach($MODEL["cats"] as $value): ?>
                            <option value="<?= $value["id"] ?>" <?php if ($value["id"] == $MODEL["category_id"]) echo("selected"); ?> ><?= $value["name"] ?></option> 
                        <?php endforeach; ?>
                        
            </select>
        </div>
        -->

        <div class="form-group">
            <label for="inputvalue">Описание</label>
            <?= $this->writeHTML(["name" => "description", "value" => $v["description"]], "shared", "editor") ?>
        </div>
        <table>




</table>

        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>

    

</div>