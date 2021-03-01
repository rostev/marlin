<?php
    require_once "database/QueryBuilder.php";

    use database\QueryBuilder;

    $db = new QueryBuilder();
    $db->delete("tasks", $_GET["id"]);

    header("Location: index.php");
