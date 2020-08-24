<?php 
    $mahasiswa = file_get_contents('data.json');

    $data = json_decode($mahasiswa, true);

    var_dump($data);

    // echo $data;

?>