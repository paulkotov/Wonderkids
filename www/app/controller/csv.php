<?php  
require_once "../model/csvmodel.php";

class Csv{
    private $csv_file_name;
    private $csv_handler;
    private $model;
    private $rows = 0;
    private $num;
    private $data = array();

    public function Csv($file_name)
    {
        if ($file_name != ""){
            $this->csv_file_name = $file_name;
            $this->csv_handler = fopen("../upload/$this->csv_file_name", "r");
        }else{
            echo "<p>No file selected</p>";
            return 0;
        }    
        if ($this->csv_handler !== FALSE) 
        {
            while (($line = fgetcsv($this->csv_handler, 0, ",")) !== FALSE)
            {
                $this->data[] = $line;
                $this->num = count($this->data);
                $this->rows++;
            }
            fclose($this->csv_handler);
        }
        $this->model = new Csvmodel();
    }
    
    // public function get_data()
    // {
    //     return $this->data; 
    // }

    public function get_record($id)
    {  
        return $this->model->show_record($id);
    }

    // public function set_record($data) //$data must be array
    // {
    //     $this->model->set_record($data);
    // }

    public function save_data()
    {
        foreach ($this->data as $value) {
            $this->model->set_record($value);
        }
    }

    public function show_info()
    {
        if ($this->csv_file_name != ""){
            foreach ($this->data as $value) { //Проходим по строкам
                echo "id: " . $value[0] . "<br/>";
                echo "login: " . $value[1] . "<br/>";
                echo "email: " . $value[2] . "<br/>";
                echo "first_name: " . $value[3] . "<br/>";
                echo "last_name: " . $value[4] . "<br/>";
                echo "role: " . $value[5] . "<br/>";
                echo "password: " . $value[6] . "<br/>";
                echo "--------<br/>";
            }
        }    
    }
}