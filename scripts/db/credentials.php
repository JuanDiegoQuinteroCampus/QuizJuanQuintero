<?php
    abstract class credentials{
    protected $host = 'localhost';
    private $user = 'root';
    
    protected $dbname = 'CAMPUSLANDS';
    public function __get($name)
    {
        return $this->{$name};
    } 
}