<ul>
    <?php foreach($MODEL as $v):?>
        <li>
            <a href="/article/byName/<?= $v["url"] ?>"><?= $v["name"] ?></a>
            <?php if(count($v["subs"]) > 0): ?>
                <?= $this->WriteHTML($v["subs"], "article", "cats"); ?>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
</ul>