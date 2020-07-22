<?php

class User extends QueryBuilder {

    public $register_result = NULL;
    public $loggedUser = NULL;

    public function registerUser() {
        $name = $_POST['register_name'];
        $email = $_POST['register_email'];
        $password = $_POST['register_password'];
        $password_repeat = $_POST['register_password_repeat'];

        $password = hash('sha512', $password);
        $password_repeat = hash('sha512', $password_repeat);

        if ($password !== $password_repeat) {
            header('Location: login_register.php?error_pass');
            die();
        }

        $sql = "INSERT INTO users VALUES (NULL, :n, :e, :p)";
        $query = $this->db->prepare($sql);
        $query->execute([
            ":n" => $name,
            ":e" => $email,
            ":p" => $password
        ]);

        if ($query) {
            $this->register_result = true;
        }
    }
    public function logUser() {
        $email = $_POST['login_email'];
        $password = $_POST['login_password'];
        $password = hash('sha512', $password);

        $sql = "SELECT * FROM users WHERE email = :e AND password = :p";
        $query = $this->db->prepare($sql);
        $query->execute([
            ":e" => $email,
            ":p" => $password
        ]);
        $loggedUser = $query->fetch(PDO::FETCH_OBJ);

        if ($loggedUser !== null) {
            $_SESSION['loggedUser'] = $loggedUser;
            $this->loggedUser = $loggedUser;
        }
    }
    public function getUserWithId($id) {
        $sql = "SELECT * FROM users WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute([":id" => $id]);

        $postOwner = $query->fetch(PDO::FETCH_OBJ);
        return $postOwner;
    }
}

?>