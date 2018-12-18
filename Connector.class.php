<?php

define(SERVER_NAME, "");
define(USERNAME, "");
define(PASSWORD, "");
define(DB_NAME, "");


class Connector
{
    public $conn = null;

    public function __construct()
    {
        $this->connect();
    }

    public function connect()
    {
        $this->conn = new mysqli(SERVER_NAME, USERNAME, PASSWORD, DB_NAME);
    }

    public function hasError()
    {
        return $this->conn->connect_error;
    }

    public function close()
    {
        $this->conn->close();
    }

    /* accepts String email and returns whether has an associated user */
    public function userRegistered($email)
    {
        $sql = "select id from users where email = '" . $email . "'";
        $result = $this->conn->query($sql);
        return $result->num_rows > 0;
    }

    /* accepts String email and returns password hash */
    public function getPassword($email)
    {
        $sql = "select password from users where email = '" . $email . "'";
        $result = $this->conn->query($sql);


        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                return $row['password'];
            }
        } else {
            return null;
        }

        return null;
    }

    /* accepts String email and returns array of info */
    public function getUserInfo($email)
    {
        $sql = "select id, name, email from users where email = '" . $email . "'";
        $result = $this->conn->query($sql);
        $row = $result->fetch_array(MYSQLI_ASSOC);

        return $row;
    }

    /* returns client array */
    public function getClients()
    {
        $sql = "select * from clients_old";
        $result = $this->conn->query($sql);
        $clients = array();

        while ($client = $result->fetch_array(MYSQLI_ASSOC)) {
            $clients[] = $client;
        }

        $this->close();

        return $clients;
    }
}
