<?php

class Database
{

    private $db;

    /**
     * Get the value of db
     */

    public function getDb()
    {
        return $this->db;
    }

    /**
     * Set the value of db
     *
     * @return  self
     */

    public function setDb($db)
    {
        $this->db = $db;

        return $this;
    }

    public function __construct()
    {
        $this->setDb(new PDO("mysql:dbname=35m;host=localhost;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]));
    }
}
