<?php


    namespace Components;

    require_once "../database/QueryBuilder.php";

    use database\QueryBuilder;
    use PDO;

    class Auth
    {
        private QueryBuilder $db;

        /**
         * Auth constructor.
         * @param QueryBuilder $db
         */
        public function __construct(QueryBuilder $db)
        {
            $this->db = $db;
        }

        public function register(string $email, string $password)
        {
            $this->db->store("users", [
                "email" => $email,
                "password" => md5($password),
            ]);
        }

        public function login(string $email, string $password): bool
        {
            $sql = "SELECT * FROM users WHERE email=:email AND password=:password LIMIT 1;";
            $statement = $this->db->getPdo()->prepare($sql);

            $statement->bindParam(":email", $email);
            $md5 = md5($password);
            $statement->bindParam(":password", $md5);

            $statement->execute();

            $user = $statement->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                $_SESSION["user"] = $user;
                return true;
            } else {
                return false;
            }
        }

        public function logout()
        {
            unset($_SESSION["user"]);
        }

        public function check(): bool
        {
            if (isset($_SESSION["user"])) {
                return true;
            }

            return false;
        }

        public function currentUser()
        {
            if (isset($_SESSION["user"])) {
                return $_SESSION["user"];
            }

            return null;
        }
    }
