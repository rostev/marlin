<?php
    error_reporting(-1);
    require_once "inc/functions.php";

    try {

        debug($_POST);

        $pdo = new PDO("pgsql:host=192.168.2.20;port=5432;dbname=notepad;user=rostev;password=asjk24qu");

        $sql = "INSERT INTO tasks (title, content) VALUES (:title, :content)";

        $statement = $pdo->prepare($sql);

        /*        $statement->bindParam("title", $_POST["title"]);
                $statement->bindParam("content", $_POST["content"]);*/

        $statement = $pdo->prepare($sql);

        $statement->execute($_POST);

        header("Location: index.php");

    } catch (PDOException $exception) {
        $tasks = [];
        echo $exception->getMessage();
    }
