<?php
$savePath = "../storage";

$allowedExts = array("txt", "pdf", "doc", "docx", "qbb", "xls", "xlsx");
$extension = end(explode(".", $_FILES["file"]["name"]));
if (in_array($extension, $allowedExts)) {
    if ($_FILES["file"]["error"] > 0) {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    } else {
        echo "Upload: " . $_FILES["file"]["name"] . "<br>";
        // echo "Type: " . $_FILES["file"]["type"] . "<br>";
        echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";

        if (file_exists($savePath . $_FILES["file"]["name"])) {
            echo $_FILES["file"]["name"] . " already exists. ";
        } else {
            move_uploaded_file($_FILES["file"]["tmp_name"], $savePath . $_FILES["file"]["name"]);
            echo $_FILES["file"]["name"]." has been successfully uploaded";
        }
    }
} else {
    echo "$extension is an invalid file type.";
}
