<h2>Добавить коментарий</h2>

<form action="/comment/save" enctype="multipart/form-data" method="POST">
    <input type="hidden" name="module" value="<?= $MODEL["module"] ?>" />
    <input type="hidden" name="ref_id" value="<?= $MODEL["id"] ?>" />
    <input type="hidden" name="parent_id" value="<?= $MODEL["parent"] ?>" />
  
    <div class="one_third first">
        <label for="user">Имя пользователя <span>*</span></label>
        <input type="text" name="user" id="user" value="" size="22" required>
    </div>

    <div class="one_third">
        <!-- <label for="email">Mail <span>*</span></label>
        <input type="email" name="email" id="email" value="" size="22" required> -->
    </div>
    <div class="one_third">
        <!-- <label for="url">Website</label>
        <input type="url" name="url" id="url" value="" size="22"> -->
    </div>

    <div class="block clear">
        <label for="text">Ваш коментарий</label>
        <textarea name="text" id="text" cols="25" rows="10"></textarea>
    </div>
    <div>
        <input type="submit" name="submit" value="Отправить">
        &nbsp;
        <!-- <input type="reset" name="reset" value="Reset Form"> -->
    </div>    
</form>

           