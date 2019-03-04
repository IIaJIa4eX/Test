<h1>Просмотр товара</h1>

<script>
    function removeLine(el) {
        var e = $(el);
        e.parent().parent().detach();
    }

    function addLine(el) {
        
        var button = $(el);
        var tr = button.parent().parent();

        
        var template = $("#lineTemplate").clone();
        template.removeAttr("id");

        tr.after(template);
    }
</script>

<table style="display:none;">
        <tr id="lineTemplate">
            <td><input name="param[name][]" value="" /></td>
            <td><input name="param[value][]" value="" /></td>
            <td>
                <button onclick="addLine(this); return false;">Add</button>
                <button onclick="removeLine(this); return false;">Remove</button>
            </td>
        </tr>
</table>

<form method="POST">
    <input type="hidden" name="action" value="edit" />
    <input type="hidden" name="id" value="<?= $MODEL["good"]["id"] ?>" />
    <table>
        <tr>
            <th>Наименование</th>
            <td><?= $MODEL["good"]["name"] ?></td>
        </tr>
        <tr>
            <th>Описание</th>
            <td>
                <?= $MODEL["good"]["description"] ?></textarea>
            </td>
        </tr>
        <tr>
           <td colspan="2">
                <?= $this->drawRoute("pic", "getPicAllByGood", [
                    "module" => "good",
                    "id" => $MODEL["good"]["id"]
                ]) ?>
            </td>
            </tr>
        <tr>
            <th>Категория</th>
            <td>    
            <a href="/good_manager/showCat/<?= $MODEL["good"]["category_id"] ?>"><?= $value["name"] ?>
            <?php foreach($MODEL["good_category"] as $value): ?>
                <p> <?php if ($value["id"] == $MODEL["good"]["category_id"]) echo $value["name"] ?></p> 
            <?php endforeach; ?>
            </a>
           
            </td>
        </tr>
        
    </table>

    <table>
    <tr>
        <th>наименование</th>
        <th>описание</th>
        </tr>
        <?php foreach($MODEL["params"] as $value): ?>
       
        <tr>
            <td><?= $value["name"] ?></td>
            <td><?= $value["value"] ?></td>
            
        </tr>
        <?php endforeach; ?>
       

        
    </table>
</form>



