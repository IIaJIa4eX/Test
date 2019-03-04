<form method="POST" action="/login/logIn">
    <input type="hidden" name="action" value="login" />
    <div class="form-group">
        <label for="imputlogin">Логин</label>
        <input type="text" class="form-control" id="imputlogin" name="login" placeholder="Введите логин">
    </div>
    <div class="form-group">
        <label for="inputpassword">Пароль</label>
        <input type="password" class="form-control" id="inputpassword" name="password" placeholder="Введите пароль">
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="saveme">
        <label class="form-check-label" for="saveme">Запомнить меня</label>
    </div>
    <button type="submit" class="btn btn-primary">Отправить</button>
</form>