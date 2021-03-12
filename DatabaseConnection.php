<?php
class DatabaseConnection {
    protected $db_host;
    protected $db_username;
    protected $db_password;
    protected $db_databasename;
    protected $db_port;
    protected $db_socket;
    protected $mysqli;

    function __construct() {
        $this->db_host = 'localhost';
        $this->db_username = 'root';
        $this->db_password =  'root';
        $this->db_databasename = 'php_crud_tutorial';
        $this->db_port = 8889;
        $this->db_socket = '/Applications/MAMP/tmp/mysql/mysql.sock';
        $this->db_connect();
    }

    private function db_connect() {
        $this->mysqli = new mysqli($this->db_host, $this->db_username, $this->db_password, $this->db_databasename, $this->db_port, $this->db_socket);
        if ($this->mysqli->connect_error) {
            die('Connection Failed' . $this->mysqli->connect_error);
        }
    }

    function selectData($db_table) {
        $this->db_connect();
        $sql = "SELECT * FROM " . $db_table;
        $sql = $this->mysqli->query($sql);
        
        return $sql;
    }

    function selectSingleRecord($db_table, $id) {
        $this->db_connect();
        $sql = "SELECT * FROM " . $db_table . " WHERE id = " . $id;
        $sql = $this->mysqli->query($sql);

        return $sql;
    }

    function updateData($value1, $value2, $value3) {
        $this->db_connect();
        $sql =
        sprintf(
            "UPDATE registered_users SET name = '%s', email = '%s' WHERE id = %d",
            $this->mysqli->real_escape_string($value1),
            $this->mysqli->real_escape_string($value2),
            $value3
        );

        $sql = $this->mysqli->query($sql);

        if ($sql === true) {
            return "Data Updated";
        } else {
            return "FAILED to execute update query";
        }
    }

    function insertData($value1, $value2 ) {
        $this->db_connect();
       $sql = sprintf(
            "INSERT INTO registered_users (name, email) VALUES ('%s', '%s')",
            $this->mysqli->real_escape_string($value1),
            $this->mysqli->real_escape_string($value2)
        );
        $sql = $this->mysqli->query($sql);

        if($sql === true) {
            return $sql;
        } else {
            return "FAILED to execute INSERT query";
        }
    }

    function deleteData($db_table, $condition) {
        $this->db_connect();
        $sql = "DELETE FROM " . $db_table . " WHERE id = " . $condition;
        $sql = $this->mysqli->query($sql);

        if($sql === true) {
            return "Data deleted successfully";
        } else {
            return "FAILED to execute DELETE query";
        }
    } 
}
