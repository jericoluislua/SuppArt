<div id="uploadform">

<?php
$form = new Form('/upload/index');

echo '

    <form enctype="multipart/form-data" action="/controller/UploadController.php" method="POST">
    
    <input type="hidden" name="MAX_FILE_SIZE" value="512000" />
    Send this file: <input name="userfile" type="file" />
    <input type="submit" value="Send File" name="upload"/>
</form>
';
$form->end();
?>
</div>