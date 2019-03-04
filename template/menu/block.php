<ul class="<?= $MODEL["class"] ?>">
    <?php foreach ($MODEL["items"] as $v) : ?>
    <li> 
        <a 
            <?php if (count($v["subs"]) > 0): ?>
            class="drop"
            <?php endif; ?>

            href="<?= $v["url"] ?>" > 
            
            <?= $v["name"] ?> 
        
        </a> 

        <?php if (count($v["subs"]) > 0): 

        echo $this->WriteHTML(
            [
                "items" => $v["subs"],
                "class" => ""
            ],
            "menu", "block"
        );

        endif; ?>        
    </li>
    <?php endforeach; ?>
</ul>