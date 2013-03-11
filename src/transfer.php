<?php require_once 'templateHeader.php'; 
    ini_set('max_input_time', 60*60);
    ini_set('max_execution_time',60*60);
    echo ini_get('max_execution_time');
    echo ini_get('max_input_time');
    exit;
?>
<h1 class="title">File Transfer</h1>
                    <h3>Please submit your file via the form below:</h3>
                    <h5>
                        <form action="upload.php" method="post" enctype="multipart/form-data">
                        <table>
                        <tr>
                            <td><label for="company">Company Name:</label></td>
                            <td>&nbsp;</td>
                            <td><input type="text" name="company" id="company"></td>
                        </tr>
                        <tr>
                            <td><label for="sender">Your email:</label></td>
                            <td>&nbsp;</td>
                            <td><input type="text" name="sender" id="sender"></td>
                        </tr>
                        <tr>
                            <td><label for="recipient">Recipient's Email:</lable></td>
                            <td>&nbsp;</td>
                            <td><input type="text" name="recipient" id="recipient"></td>
                        </tr>
                        <tr>
                            <td><label for="notes">Notes:</label></td>
                            <td>&nbsp;</td>
                            <td><textarea name='notes' id='notes'></textarea></td>
                        </tr>
                        <tr>
                            <td><label for="file">Filename:</label></td>
                            <td>&nbsp;</td>
                            <td><input type="file" name="file" id="file"></td>
                        </tr>
                        <tr>
                            <td><center><input type="submit" name="submit" value="Submit"></center></td>
                        </tr>
                        </table>
</form></h5>
<?php require_once 'templateFooter.php'; ?>
