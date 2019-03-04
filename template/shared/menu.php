<ul class="nav flex-column">
    <?php foreach($MODEL as $v): ?>
    <li class="nav-item">
        <a class="nav-link" href="<?= $v["href"] ?>"><?= $v["text"] ?></a>
    </li>
    <?php endforeach; ?>
</ul>