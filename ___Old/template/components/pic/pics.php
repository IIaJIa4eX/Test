<div class="many-pic">
  <?php foreach($MODEL as $value): ?>
      <img src="<?= $value["link"] ?>" alt="<?= $value["name"] ?>" />
  <?php endforeach; ?>
</div>