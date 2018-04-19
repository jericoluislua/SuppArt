<article class="review open special">
	<?php
    if (!empty($users)):
        foreach ($users as $user){
            $form = new Form('/user/doLogin');

            echo $form->email()->label('E-Mail')->name('loginemail');
            echo $form->password()->label('Password')->name('loginpassword');
            echo $form->submit()->label('login')->name('loginsend');

            $form->end();
        }
        ?>
	<?php else: ?>
        <div class="dhd">
            <h2 class="item title">Hoopla! Keine User gefunden.</h2>
        </div>
	<?php endif ?>
</article>
