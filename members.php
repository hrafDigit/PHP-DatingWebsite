<?php

$file='data.json';
$data=file_get_contents($file);
$obj=json_decode($data);
print_r($obj);
foreach($obj as $name => $city ) {
    echo $name.' habite à'.$city;
}


?>