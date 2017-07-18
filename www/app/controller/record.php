<?php  
require_once "../model/recordmodel.php";

class Record{
    private $recordmodel;

    public function Record()
    {
        $this->recordmodel = new Recordmodel();
    }

    public function get_record($id)
    {
        return $this->recordmodel->get_record($id);   
    }

    public function set_record($data)
    {
        $this->recordmodel->set_record($data);  
    }

    public function get_last_id()
    {
        return $this->recordmodel->last_index();
    }
}
?>