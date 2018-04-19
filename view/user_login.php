<div id="regform">

<?php

$form = new Form('/user/doLogin');


echo $form->email()->label('E-Mail')->name('loginemail');
echo $form->password()->label('Password')->name('loginpassword');

echo $form->submit()->label('login')->name('send');

$form->end();

?>
</div>