<?php
class Model
{

    public $id;
    protected $db;


    public function __construct()
    {
        $this->db = new Database();

    }


}