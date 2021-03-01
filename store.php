<?php
    error_reporting(-1);

    require_once "database/QueryBuilder.php";

    use database\QueryBuilder;

    $db = new QueryBuilder();
//    $db->addTask($_POST);
    $db->store("tasks", $_POST);

    header("Location: index.php");
    exit;
