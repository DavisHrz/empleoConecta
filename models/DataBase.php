<?php
    class DataBase {
        var $host;
        var $user;
        var $password;
        var $database;

        function __construct(){
            $this->host = "localhost";
            $this->user = "root";
            $this->password = "";
            $this->database = "db";
        }

        function connect(){
            $connection = mysqli_connect($this->host, $this->user, $this->password);

            if( !$connection ){
                die("Connection failed: " . mysqli_connect_error() );
            }

            if( !mysqli_select_db($connection, $this->database) ){
                die("Data base not found");
            }

            return $connection;
        }
    }
?>