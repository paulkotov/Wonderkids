<?php
require_once "PDOconnector.php";

class Recordmodel{
    private $connector;
    private $last_index;
    
    public function Recordmodel()
    {
        $this->connector = PDOconnector::getInstance();
        $this->connector->start();
        $this->last_index = $this->connector->get_last();
        $this->connector->close();

    }

    public function last_index()
    {
        return $this->last_index;
    }

    public function get_record($id)
    {
        $this->connector->start();
        $row = $this->connector->get($id);
        $this->connector->close();
        return $row; 
    }

}
?>