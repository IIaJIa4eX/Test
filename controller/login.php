<?php

class login extends ControllerBase {

    /**
     * @var db $db
     */
    private $db;

    /**
     * @var user $user
     */
    private $user;

    public function __construct()
    {
        $this->db = app::Current()->getDB();
        $this->user = app::Current()->getUser();
    }


    protected function logIn() {
        if (isset($_POST["action"]) &&
            $_POST["action"] == "login") {

            //Получаем логин/пароль из запроса
            $login = $_POST["login"];
            $password = $_POST["password"];

            $item = $this->db->selectOne("SELECT * FROM `user` WHERE `login` = :login", 
            ["login" => $login]);
            
            if ($item === false)
                return $this->index(["Пользователь не найден"]);

            if ($item["pass"] == $password) {
                $id  = $item["id"];

                app::Current()->getUser()->logIn($login, $id);
                
                return $this->index();

            } else {
                return $this->index(["Неверный пароль"]);
            }           
        }

        return $this->index();
    }



    //Отображение страницы с информацией пользователя
    //или формы авторизации
    public function index($err = []) {

        $login = app::Current()->getUser()->getLogin();

        if ($login == "")
            return $this->Render()->WriteHTML(
                $err,
                "user",
                "login"
            );
        else
            return $this->Render()->WriteHTML(
                $login,
                "user",
                "index"
            );
    
    }


    //Выход из системы
    public function logOut() {
        app::Current()->getUser()->logOut();
        return $this->Render()->Redirect("home", "index");
    }


    //Отображение кнопки авторизации или выхода
    //ВИДЖЕТ
    public function displayButton() {

        if ($this->user->isLogined())
            return $this->Render()->WriteHTML($this->user->getLogin(), "user", "logout_block");
        else
            return $this->Render()->WriteHTML("", "user", "login_block");
    }



}