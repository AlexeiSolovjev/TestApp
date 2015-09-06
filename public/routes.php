<?php
/**
 * если значения $_GET['controller'] и $_GET['action'] не проинициализированны - присваиваем дефолтные значения
 */
if( ! isset( $_GET['controller'] ) ) {
    $_GET['controller'] = 'index';
    $_GET['action'] = 'index';
}
/**
 * переменная используется для отслеживания возможности обработать запрос
 */
$canProcessRequest = false;
if (isset ($_GET['controller']) && ($_GET['action']) ) {
    $controllerName = ucfirst($_GET['controller']).'Controller';
    if (file_exists('controllers/'.$controllerName.'.php') ){
        $controller = new $controllerName();
        if (method_exists($controller,$_GET['action'])){
            $controller->$_GET["action"]();
            $canProcessRequest = true;
        }
    }
}
if( ! $canProcessRequest ){
    addNotification('Please provide valid parameters', 'error');
    header('Location: /?controller=index&action=index');
}