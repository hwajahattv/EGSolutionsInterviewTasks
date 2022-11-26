<?php
// echo $_FILES["fileToUpload"]["name"];
$target_dir = "uploads/";
$string =$_FILES["fileToUpload"]["name"];
$filename = pathinfo($string, PATHINFO_FILENAME);
if(strlen($filename)==1){
    $target_dir = $target_dir.$filename."/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir,0777, true);
    }
}
else{
    $target_dir = $target_dir.$filename[0]."/".$filename[1]."/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir,0777, true);
    }
}

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


// Check if file already exists
if (file_exists($target_file)) {
  $currentDate= date("Y/m/d");
    $currentDate = str_replace('/', '', $currentDate);

    date_default_timezone_set('Asia/Karachi');
  $currentTime= date("h:i:sa");
    $currentTime = str_replace(':', '', $currentTime);
//    echo $currentTime;
  $filename = $filename."-".$currentDate."-".$currentTime.".".$imageFileType;
  $target_file = $target_dir.$filename;
//  echo ($target_file);
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file already exists. So the renamed file ". htmlspecialchars( $filename). " has been
    uploaded.";
    } else {
    echo "Sorry, there was an error uploading your file.";
        $uploadOk = 0;
    }
}
else {
    echo($target_file);
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
}