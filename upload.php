<?php
if(isset($_FILES['file'])){
  $file = file_get_contents($_FILES['file']['tmp_name']);
  $f = finfo_open();
  $mime_type = finfo_buffer($f, $file, FILEINFO_MIME_TYPE);
  
  $supported_types = array(
    "audio/x-wav" => "wav",
    "image/png" => "png",
    "image/jpeg" => "jpg",
    "image/pjpeg" => "jpg",
    "image/gif" => "gif"
  );
  
  $extension = isset($supported_types[$mime_type]) ? $supported_types[$mime_type] : false;
  if($extension !== false){
    $fileName = rand(10000, 65000) . "." . $extension;
    $location = __DIR__ . "/uploads/" . $fileName;
    
    move_uploaded_file($_FILES['file']['tmp_name'], $location);
    echo $fileName;
  }
}