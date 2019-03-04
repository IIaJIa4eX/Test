<article id="comment_<?= $MODEL["id"] ?>">
    <header>
        <figure class="avatar">
            <img src="/img/avatar.png" alt="">
        </figure>
        <address>
            By <a href="#"><?= $MODEL["user"] ?></a>
        </address>
        <time datetime="<?= $MODEL["create_date"] ?>"><?= $MODEL["create_date"] ?></time>
    </header>
    <div class="comcont">
        <p><?= $MODEL["text"] ?></p>
    </div>
    <div>
        <a 
            style="display: block;text-align: right;"
            onclick="$(this).parent().children('.form').show();$(this).hide();"
            >Добавить комментарий</a>
        <div class="form" style="display:none;">
        <?= $this->drawRoute("comment", "add", [
                "module" => "article",
                "id" => $MODEL["ref_id"],
                "parent" => $MODEL["id"]
            ]) ?>          
        </div>
    </div>
    <div style="padding-left: 20px;">
        <ul>
            <?php foreach ($MODEL["subs"] as $value): ?>
                <li>
                    <?= $this->WriteHTML( $value, "comment", "one" ) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</article>







