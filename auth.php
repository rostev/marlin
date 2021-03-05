<?php
    session_start();
    require_once "Components/Auth.php";
    require_once "inc/functions.php";

    use Components\Auth;
    use database\QueryBuilder;

    $auth = new Auth(new QueryBuilder());
    //$auth->register("boris@mail.ru", "qwerty");

    debug($auth->login("boris@mail.ru", "qwerty"));
    debug($_SESSION);
    debug($auth->check());

    debug($auth->currentUser());
    $auth->logout();
    debug($auth->check());

    exit;
