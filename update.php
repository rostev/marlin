<?php
    error_reporting(-1);

    require_once "database/QueryBuilder.php";

    use database\QueryBuilder;

    $db = new QueryBuilder();
    $db->update("tasks", $_POST);

    header("Location: index.php");
    exit;


