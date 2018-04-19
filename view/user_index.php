<article class="review open special">
	<?php
    if (!empty($users)):
        foreach ($users as $user){
            $form = new Form('/user/doCreate');

            echo $form->text()->label('E-Mail')->name('email');
            echo $form->password()->label('Password')->name('password');
            echo $form->submit()->label('login')->name('send');

            $form->end();
        }
        ?>
	<?php else: ?>
        <div class="dhd">
            <h2 class="item title">Hoopla! Keine User gefunden.</h2>
        </div>
	<?php endif ?>
</article>
