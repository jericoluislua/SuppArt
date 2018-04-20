<div id="regform">

<?php

require_once '../controller/LoginController.php';

$form = new Form('/login');





echo $form->email()->label('E-Mail')->name('loginemail');
echo $form->password()->label('Password')->name('loginpassword');

echo $form->submit()->label('login')->name('loginsend');

$form->end();

?>
</div>