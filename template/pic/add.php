<form action="/pic/save" enctype="multipart/form-data" method="POST">
    <input type="hidden" name="module" value="<?= $MODEL["module"] ?>" />
    <input type="hidden" name="ref_id" value="<?= $MODEL["id"] ?>" />


    <input type="text" name="name" />
    <input type="text" name="cat" />
    <input type="file" name="file" />
    <input type="submit" value="Отправить" />
</form>