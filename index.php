<?php
    $tasks = $db->all("tasks");
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

                    <h1>All tasks</h1>
                    <a href="create" class="btn btn-success mt-3">Add task</a>

                    <table class="table mt-3">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        <? foreach ($tasks as $task): ?>
                            <tr>
                                <td><?= $task["id"] ?></td>
                                <td><?= $task["title"] ?></td>
                                <td>
                                    <a href="show.php?id=<?= $task["id"] ?>" class="btn btn-info">Info</a>
                                    <a href="edit.php?id=<?= $task["id"] ?>" class="btn btn-warning">Edit</a>
                                    <a href="delete.php?id=<?= $task["id"] ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <? endforeach; ?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </body>
</html>