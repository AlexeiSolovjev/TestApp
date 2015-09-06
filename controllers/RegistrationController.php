<?php
class RegistrationController
{
    /**
     * отображение формы регистрации и проверка введенных данных
     */
    public function register()
    {
        if (isset($_SESSION['logged_user'])) {
            header('Location: /');
        }
        $errors = array();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!isset($_POST['exampleInputName']) || empty($_POST['exampleInputName'])) {
                $errors['exampleInputName'] = "This field is required";
            }
            if (strlen($_POST['exampleInputName']) > 50) {
                $errors['exampleInputName'] = "This lengh is not correct";
            }
            if (!isset($_POST['exampleInputSurname']) || empty($_POST['exampleInputSurname'])) {
                $errors['exampleInputSurname'] = "This field is required";
            }
            if (strlen($_POST['exampleInputSurname']) > 50) {
                $errors['exampleInputSurname'] = "This lengh is not correct";
            }
            if (!isset($_POST['exampleInputEmail1']) || empty($_POST['exampleInputEmail1'])) {
                $errors['exampleInputEmail1'] = "This field is required";
            }
            if (strlen($_POST['exampleInputEmail1']) > 255) {
                $errors['exampleInputEmail1'] = "This lengh is not correct";
            }
            if (!filter_var($_POST['exampleInputEmail1'], FILTER_SANITIZE_EMAIL)) {
                $errors['exampleInputEmail1'] = "This field is required";
            }
            if (!isset($_POST['exampleInputPassword1']) || empty($_POST['exampleInputPassword1'])) {
                $errors['exampleInputPassword1'] = "This field is required";
            }
            if (strlen($_POST['exampleInputPassword1']) > 255) {
                $errors['exampleInputPassword1'] = "This lengh is not correct";
            }
            if (strlen($_POST['exampleInputPassword1']) < 6) {
                $errors['exampleInputPassword1'] = "This lengh is not correct";
            }
            if (!isset($_POST['exampleInputRepeatPassword1']) || empty($_POST['exampleInputRepeatPassword1'])) {
                $errors['exampleInputRepeatPassword1'] = "This lengh is not correct";
            }
            if ($_POST['exampleInputPassword1'] != $_POST['exampleInputRepeatPassword1']) {
                $errors['exampleInputRepeatPassword1'] = "This password dont equalTo";
            }

            $path = $_FILES['exampleInputFile']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $allowedExt = array('gif', 'jpg', 'png', 'jpeg');
            if (!in_array($ext, $allowedExt)) {
                $errors['exampleInputFile'] = "This file is incorrect";
            }

            if (!$errors) {
                if (is_uploaded_file($_FILES["exampleInputFile"]["tmp_name"])) {
                    move_uploaded_file($_FILES["exampleInputFile"]["tmp_name"], BASE_PATH . '/public/' . $_FILES["exampleInputFile"]["name"]);
                }
                $_POST['profile_image'] = BASE_PATH . '/public/' . $_FILES["exampleInputFile"]["name"];
                $usersModel = new UsersModel;
                $usersModel->save($_POST);
                addNotification('You have successfuly registered!. Please login with you credentials;');
                header('Location: /?controller=registration&action=login');
            }


        }
        include 'views/register.php';
    }

    /**
     * отображение формы логина и проверка данных
     */

    public function login()
    {
        if (isset($_SESSION['logged_user'])) {
            header('Location: /');
        }
        $errors = array();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!isset($_POST['exampleInputEmail1']) || empty($_POST['exampleInputEmail1'])) {
                $errors['exampleInputEmail1'] = "This field is required";
            }
            if (!isset($_POST['exampleInputPassword1']) || empty($_POST['exampleInputPassword1'])) {
                $errors['exampleInputPassword1'] = "This field is required";
            }
            if (!$errors) {
                $usersModel = new UsersModel;
                $status = $usersModel->checUserExist($_POST);
                if ($status) {
                    $_SESSION['logged_user'] = $status;
                    addNotification('Welcome!');
                    header('Location: /');
                } else {
                    $errors['exampleInputEmail1'] = "Please verify you credentials";
                }
            }
        }
        include 'views/login.php';
    }

    /**
     * уничтожение сесси данного пользователя
     */
    public function logout()
    {
         unset($_SESSION['logged_user']);
         header('Location: /?controller=registration&action=login');

    }

}

