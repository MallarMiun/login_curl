<?php

class Users {
    private $db;

    public function __construct()
    {
        $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
        if($this->db->connect_errno > 0) {
            die("Fel vid anslutning [" . $this->db->connect_error ." ]");
        }
    }

}