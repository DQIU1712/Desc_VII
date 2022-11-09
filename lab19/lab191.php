<?php
$arr_file_types=['image/png','image/gif','image/jpg','image/jpeg'];

if(!(in_array($_FILES['file']['type'],$arr_file_types))){
    echo "false";
    return;
}

if(!file_exists('archivos')){
    mkdir('archivos', 0777);
}

$filename=time().'_'.$FILES['file']['name'];

move_uploaded_file($FILES['file']['tmp_name'], 'archivos/'.$filename);

echo 'archivos/'.$filename;
die;
?>