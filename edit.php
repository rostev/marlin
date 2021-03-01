<?php
    require_once "database/QueryBuilder.php";

    use database\QueryBuilder;

    $db = new QueryBuilder();
    //$task = $db->getTask($_GET["id"]);
    $task = $db->getOne("tasks", $_GET["id"]);
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
                <div class="col-md-12 mt-5">
                    <h1>Edit task</h1>

                    <form action="update.php" method="post">
                        <input type="hidden" name="id" value="<?= $task["id"]?>">

                        <div class="form-group">
                            <input type="text" class="form-control" name="title" value="<?= $task["title"]; ?>">
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" name="content"><?= $task["content"]; ?></textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-warning">Submit</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>

    </body>
</html>