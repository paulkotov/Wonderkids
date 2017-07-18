<?php
require_once "PDOconnector.php";

class Csvmodel
{
    private $connector;

    public function Csvmodel()
    {
        $this->connector = PDOconnector::getInstance();
    }

    public function get_record($id)
    {
        $this->connector->start();
        $row = $this->connector->get($id);
        $this->connector->close();
        return  $row;
    }

    public function set_record($record)
    {
        $this->connector->start();
        $this->connector->set($record);
        $this->connector->close();
    }
}
