<?php
 if(!isset($_SESSION)){
    session_start();
 }
 if(!isset($_SESSION['id'])){
    die('Você nao pode acessar essa pagina, Não esta logado.<p><a href="index.php\">Entrar</a></p>');
 }
 ?>