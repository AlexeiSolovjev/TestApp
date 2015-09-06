<?php
class IndexController
{
    /**
     * если юзер залогинен показываются его данные, если нет - показываются ссылки на логин и регистрацию
     */
    public function index()
    {
        if (isset($_SESSION['logged_user'])) {
            include 'views/user.php';
        } else {
            include 'views/index.php';
        }
    }
}
