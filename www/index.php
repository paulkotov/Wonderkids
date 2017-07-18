<?php
    use BootstrapPHP\BootstrapPHP;
    
    include_once 'app\view\BootstrapPHP\BootstrapPHP.php';
    BootstrapPHP::register_autoload();
  
// Начинаем сессию  
session_start();  
// Массив с доступами (для упрощенного примера)
$access = array("admin","123");  

// Разносим значения по переменным 
$login = trim($access[0]);  
$passw = trim($access[1]);  
// Проверям были ли посланы данные  
if(!empty($_POST['enter']))  
{  
        $_SESSION['login'] = $_POST['login'];  
        $_SESSION['passw'] = $_POST['passw'];  
}  

// Если ввода не было, или они не верны  
// просим их ввести  
if(empty($_SESSION['login']) or  
   $login != $_SESSION['login'] or  
   $passw != $_SESSION['passw'] )
{  
?>
    <h4>Вы не авторизованы</h4>
     <form action=index.php method=post>  
     Логин <input class=input name=login value="" type="text">  
     Пароль <input class=input name=passw value="" type="password">  
     <input type=hidden name=enter value=yes>  
     <input class=button type=submit value="Вход">  
   <?php  
   die;  
}  
else{
    header("Location: app/view/main.html");
}
?>
