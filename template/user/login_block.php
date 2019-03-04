<ul class="nospace inline pushright">
    <li><i class="fa fa-sign-in"></i> <a data-toggle="modal" data-target="#exampleModal" href="#">Login</a></li>
</ul>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Авторизация</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    
                <?= $this->WriteHTML("", "user", "part/login_form") ?>

            </div>
        </div>
    </div>
</div>