<?php

    namespace database;

    require_once "inc/functions.php";

    use PDO;
    use PDOException;

    class QueryBuilder
    {
        private PDO $pdo;

        public function __construct()
        {
            $this->pdo = new PDO("pgsql:host=192.168.2.20;port=5432;dbname=notepad;user=rostev;password=asjk24qu");
        }
//        public function getAllTasks(): array
//        {
//            try {
//                /*        $pdo = new PDO("pgsql:host=192.168.2.20;port=5432;dbname=notepad",
//                            "rostev",
//                            "asjk24qu");*/
//
//
//                $sql = "SELECT * FROM tasks ORDER BY id;";
//                $statement = $this->pdo->prepare($sql);
//                $statement->execute();
//
//                return $statement->fetchAll(PDO::FETCH_ASSOC);
//
//            } catch (PDOException $exception) {
//                echo $exception->getMessage();
//
//                return [];
//            }
//        }
        public function all(string $table): array
        {
            try {

                $sql = "SELECT * FROM ${table} ORDER BY ${table}.id;";
                $statement = $this->pdo->prepare($sql);
                $statement->execute();

                return $statement->fetchAll(PDO::FETCH_ASSOC);

            } catch (PDOException $exception) {
                echo $exception->getMessage();

                return [];
            }
        }
//        public function addTask(array $data): void
//        {
//            try {
//                $sql = "INSERT INTO tasks (title, content) VALUES (:title, :content)";
//                /*        $statement->bindParam("title", $_POST["title"]);
//                        $statement->bindParam("content", $_POST["content"]);*/
//                $statement = $this->pdo->prepare($sql);
//                $statement->execute($data);
//
//            } catch (PDOException $exception) {
//                echo $exception->getMessage();
//            }
//        }
        public function store(string $table, array $data): void
        {
            try {
                $keys = array_keys($data);
                $stringOfKeys = implode(", ", $keys);
                $placeHolders = ":" . implode(", :", $keys);

                $sql = "INSERT INTO ${table} (${stringOfKeys}) VALUES (${placeHolders})";
                /*        $statement->bindParam("title", $_POST["title"]);
                        $statement->bindParam("content", $_POST["content"]);*/
                $statement = $this->pdo->prepare($sql);
                $statement->execute($data);

            } catch (PDOException $exception) {
                echo $exception->getMessage();
            }
        }
//        public function getTask(string $id): array
//        {
//            try {
//
//
//                $sql = "SELECT * FROM tasks WHERE id=:id;";
//                $statement = $this->pdo->prepare($sql);
//                $statement->execute(["id" => $id]);
//
//                return $statement->fetch(PDO::FETCH_ASSOC);
//
//            } catch (PDOException $exception) {
//                echo $exception->getMessage();
//                return [];
//            }
//        }
        public function getOne(string $table, string $id): array
        {
            try {


                $sql = "SELECT * FROM ${table} WHERE ${table}.id=:id;";
                $statement = $this->pdo->prepare($sql);
                $statement->execute(["id" => $id]);

                return $statement->fetch(PDO::FETCH_ASSOC);

            } catch (PDOException $exception) {
                echo $exception->getMessage();
                return [];
            }
        }
//        public function updateTask(array $data): void
//        {
//            try {
//
//                $sql = "UPDATE tasks SET title=:title, content=:content WHERE id=:id;";
//                $statement = $this->pdo->prepare($sql);
//                $statement->execute(["id" => $data["id"], "title" => $data["title"], "content" => $data["content"]]);
//
//            } catch (PDOException $exception) {
//                echo $exception->getMessage();
//            }
//
//        }
        public function update(string $table, array $data): void
        {
            try {

                $keys = "";

                foreach ($data as $key => $value) {
                    $keys .= $key . "=:" . $key . ", ";
                }

                $keys = rtrim($keys, ", ");

                $sql = "UPDATE ${table} SET ${keys} WHERE ${table}.id=:id;";

                $statement = $this->pdo->prepare($sql);
                $statement->execute($data);

            } catch (PDOException $exception) {
                echo $exception->getMessage();
            }

        }
//        public function deleteTask(string $id): void
//        {
//            try {
//
//                $sql = "DELETE FROM tasks WHERE id=:id;";
//                $statement = $this->pdo->prepare($sql);
//                $statement->execute(["id" => $id]);
//
//            } catch (PDOException $exception) {
//                echo $exception->getMessage();
//            }
//        }
        public function delete(string $table, string $id): void
        {
            try {

                $sql = "DELETE FROM ${table} WHERE ${table}.id=:id;";
                $statement = $this->pdo->prepare($sql);
                $statement->execute(["id" => $id]);

            } catch (PDOException $exception) {
                echo $exception->getMessage();
            }
        }
    }
