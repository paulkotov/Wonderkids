<form enctype="multipart/form-data" action="loadform.php" method="post">
    <input type="file" name="csv" />
    <input type="submit" value="Load records"/>
</form>
</br>
</hr>
<div id="files">Loaded:</div>

<?php
    require_once "../controller/csv.php";
    if (!empty($_FILES)) 
    {
        printf($_FILES["csv"]["name"]);
        $tmp_name = $_FILES["csv"]["tmp_name"];
        $name = basename($_FILES["csv"]["name"]);
        move_uploaded_file($tmp_name, "../upload/$name");
        $csv = new Csv($_FILES["csv"]["name"]);
        $csv->save_data();
        echo "</br><b>Записано:</b></br>\n";
        $csv->show_info();

    }
?>
