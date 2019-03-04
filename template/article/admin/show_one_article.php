<?php
$v = $MODEL["article"];
?>

<div class="card">
    <div class="card-body">
        <h5 class="card-title"><?= $v["name"] ?>  (<?= $v["create_date"] ?> ) </h5>


        <p class="card-text"><?= $v["short_text"] ?></p>
        <p class="card-text"><?= $v["text"] ?></p>
        
            

     
    </div>
</div>
