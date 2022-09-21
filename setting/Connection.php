<?php

    class ConnectionDB{

        private $hostname = "localhost";
        private $database = "dbsiav"; 
        private $username = "root"; 
        private $password = "";
        private $charset = "utf8";
        
        function connect(){

            $connection= mysqli_connect($this->hostname, $this->username,
                                        $this->password, $this->database);

            if($connection){

                return $connection;

            }else{

                echo"Error al conectar";
            }

        }
            
    }


?>