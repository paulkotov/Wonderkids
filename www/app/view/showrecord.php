<?php
include "../controller/record.php";

$record = new Record();
$id = rand(1, $record->get_last_id());
$row = $record->get_record($id);
//echo var_dump($row);
print $row[0]["first_name"]." ".$row[0]["last_name"]." (id=".$row[0]["id"].")";

?>