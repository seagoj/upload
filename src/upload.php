<?php
    ini_set('max_input_time', 60*60);
    ini_set('max_execution_time',60*60);
    echo ini_get('max_execution_time');
    echo ini_get('max_input_time');
    exit;

function upload()
{
    $savePath = "../files/";

    $allowedExts = array("txt", "pdf", "doc", "docx", "qbb", "xls", "xlsx");
    $extension = end(explode(".", $_FILES["file"]["name"]));
    if (in_array($extension, $allowedExts)) {
        if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
        } else {
            echo "File Name: " . $_FILES["file"]["name"] . "<br>";
            // echo "Type: " . $_FILES["file"]["type"] . "<br>";
            echo "File Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";

            if (file_exists($savePath . $_FILES["file"]["name"])) {
                echo $_FILES["file"]["name"] . " already exists. ";
            } else {
                move_uploaded_file($_FILES["file"]["tmp_name"], $savePath . $_FILES["file"]["name"]);
                echo $_FILES["file"]["name"]." has been successfully uploaded";
                
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                // Additional headers
                $headers .= 'From: File Transfer <filetransfer@bas-cpa.com>' . "\r\n";
                


                $ftpString = "ftp://sfccpa.com";

                $body = "A file has been uploaded from ".$_POST['company']." by ".$_POST['sender'].". ".$_POST['notes']."<br/><br/>Please retrieve by clicking <a href='".$ftpString."'>here</a>.";

                mail($_POST['recipient'], "File Transfer from ".$_POST['company'], $body, $headers);
            }
        }
    } else {
        echo "$extension is an invalid file type.";
    }
}
?>

<?php require_once 'templateHeader.php'; ?>
<h1 class="title">File Transfer</h1>
<!--//<h3>Please submit your file via the form below:</h3>//-->
<h5><?php upload(); ?></h5>
<?php require_once 'templateFooter.php'; ?>
