<?php
class dbconnection extends PDO
{
    private $host = "localhost";
    private $dbname = "forum_klas1";
    private $user = "thy";
    private $pass = "1234";
    public function __construct ()
    {
        parent::__construct("mysql:host=".$this->host.";dbname=".$this->dbname."; charset=utf8", $this->user, $this->pass);
        $this->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }
}