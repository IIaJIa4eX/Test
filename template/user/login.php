


<div class="col-3">

</div>
<div class="col-9">
    <div class="contaner">
        <div class="row">
            <div class="col-5">
                <?= $this->WriteHTML("", "user", "part/login_form") ?>
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <div>
                    <?php foreach ($MODEL as $value): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $value ?>
                    </div>
                    <?php endforeach; ?>
                </div>                    
            </div>
        </div>
    </div>
</div>




