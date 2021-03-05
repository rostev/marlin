<?php

    error_reporting(-1);

    if (!session_status()) {
        session_start();
    }

    require_once "../inc/functions.php";
    require_once "../database/QueryBuilder.php";
    require_once "../Components/Auth.php";
    require_once "../Components/Account.php";

    use Components\Account;
    use Components\Auth;
    use database\QueryBuilder;

    /*    $tasks = [
            [
                "id" => 12,
                "title" => "Title 2",
                "content" => "Content for title 2",
            ],
            [
                "id" => 13,
                "title" => "Title 3",
                "content" => "Content for title 3",
            ],
            [
                "id" => 14,
                "title" => "Title 4",
                "content" => "Content for title 4",
            ],

        ];*/

    /*    $db = new QueryBuilder();
        $auth = new Auth($db);

        $url = $_SERVER["REQUEST_URI"];

        if ($url === "/list") {
            require_once "../index.php";
            exit;
        } elseif ($url === "/contact") {
            echo "<h1>Contact page</h1>";
            exit;
        }elseif ($url === "/create") {
            require_once "../create.php";
            exit;
        }

        echo "<h1>404 Page not found!!!</h1>";*/

    $account = new Account();


    try {
        $account->withDraw(0.0);
    } catch (Exception $exception) {
        echo $exception->getMessage();
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
              integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l"
              crossorigin="anonymous">

        <title>Notepad</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                </div>
            </div>
        </div>

    </body>
</html>