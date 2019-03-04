<!-- ################################################################################################ -->
<h1><?= $MODEL["name"] ?></h1>

<?= $MODEL["text"] ?>


<div id="comments">
    <h2>Comments</h2>

    <?= $this->drawRoute("comment", "all", [
                    "module" => "article",
                    "id" => $MODEL["id"]
                ]) ?>

    <?= $this->drawRoute("comment", "add", [
                "module" => "article",
                "id" => $MODEL["id"]
            ]) ?>                 

</div>