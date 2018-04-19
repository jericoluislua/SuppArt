<div id="regform">

<?php

$form = new Form('/registration/doCreate');

echo $form->text()->label('Name')->name('firstName');
echo $form->text()->label('Surname')->name('lastName');
echo $form->email()->label('E-Mail')->name('email');
echo $form->password()->label('Password')->name('password');
echo $form->password()->label('Admin')->name('admin');
echo $form->submit()->label('Register')->name('send');

$form->end();

?>
</div>