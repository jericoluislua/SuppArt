<article class="review open special">
    <?php if (isset($users)): ?>
        -        <?php foreach ($users as $user): ?>
            -            <div class="panel panel-default">
                -                <div class="panel-heading"><?= $user->firstName; ?> <?= $user->lastName; ?></div>
                -                <div class="panel-body">
                    -                    <p class="description">  A user with the name <?= $user->firstName; ?> <?= $user->lastName; ?> already exists. User's E-Mail: <a href="mailto:<?= $user->email; ?>"><?= $user->email; ?></a></p>
                    -                    <p>
                        -                        <a title="Löschen" href="/user/delete?id=<?= $user->id ?>">Löschen</a>
                        -                    </p>
                    -                </div>
                -            </div>
            -        <?php endforeach ?>
	<?php else: ?>
        <div class="dhd">
            <h2 class="item title">Hoopla! Keine User gefunden.</h2>
        </div>
	<?php endif ?>
</article>
