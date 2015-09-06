<?php
define('BASE_PATH', __DIR__);
if(!isset($_SESSION)){session_start();}
/**
 * Добавляем сообщение в сессию
 * @param $message
 * @param $status
 */
function addNotification( $message, $status ){
    $_SESSION['notification'] = array( 'message' => $message, 'status' => $status );
}

/**
 * отображаем сообщение из сессии
 * @param $message
 * @param $status
 */
function showNotification(){
    if( isset( $_SESSION['notification'] ) ){
        echo '<div class="alert-'.$_SESSION['notification']['status'].'">'.$_SESSION['notification']['message'].'</div>';
    }
    unset( $_SESSION['notification'] );
}
include 'controllers/IndexController.php';
include 'controllers/RegistrationController.php';
include 'models/UsersModel.php';
include 'public/layout.php';
?>