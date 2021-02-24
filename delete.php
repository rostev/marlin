<?php
    try {
        $pdo = new PDO("pgsql:host=192.168.2.20;port=5432;dbname=notepad;user=rostev;password=asjk24qu");

        $sql = "DELETE FROM tasks WHERE id=:id;";
        $statement = $pdo->prepare($sql);
        $statement->execute(["id" => $_GET["id"]]);

        header("Location: index.php");

    } catch (PDOException $exception) {
        echo $exception->getMessage();
    }