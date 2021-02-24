<?php
    error_reporting(-1);
    require_once "inc/functions.php";

    try {
        $pdo = new PDO("pgsql:host=192.168.2.20;port=5432;dbname=notepad;user=rostev;password=asjk24qu");

        $sql = "UPDATE tasks SET title=:title, content=:content WHERE id=:id;";
        $statement = $pdo->prepare($sql);
        $statement->execute(["id" => $_POST["id"], "title" => $_POST["title"], "content" => $_POST["content"]]);

        header("Location: index.php");

    } catch (PDOException $exception) {
        echo $exception->getMessage();
    }

    debug($_POST);