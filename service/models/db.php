<?php
class DB {
    private $connection;
    private $host = "127.0.0.1";
    private $user = "root";
    private $password = "";
    private $db_name = "test";

    public function __construct()
    {
        $this->connection = new mysqli($this->host, $this->user, $this->password, $this->db_name);

        $this->connection->query("SET NAMES UTF8");

        if( $this->connection->connect_error ) {
            throw new Exception('Could not connect to DB ');
        }
    }

    public function query($sql)
    {

        if(!$this->connection)
            return false;

        if ($this->connection->connect_error) {
            throw new Exception('Could not connect');
        }

        $result = $this->connection->query($sql);

        if ( is_bool($result) ){
            return $result;
        }

//        $data = array();
//        while( $row = $result->fetch_assoc()){
//            $data[] = $row;
//        }

        $row = $result->fetch_assoc();

        $result->free();

        return $row;
    }

    public function close(){
        $this->connection->close();
    }
}