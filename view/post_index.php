

<article class="hreview open special">

    <?php

    if (empty($entry)): ?>
        <div class="dhd">
            <h2 class="item title">Hoopla! no entries found.</h2>
        </div>
    <?php else: ?>
        <?php foreach ($entry as $entries): ?>
            <?php if (!$entries->private): ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1><?= $entries->title ;?></h1>
                        <?php if((Security::isAuthenticated() && $_SESSION['LoggedIn'] == $entries->creator) || Security::isAdmin()){ ?>
                            <a title='comment' href='/upload/changeTitle?id=<?=$entries->id?>'>Change title</a>
                        <?php } ?>
                        <p class="poster_date">Date: <?= $entries->date ?></p>
                    </div>
                    <div class="panel-body">
                        <img src="<?php echo $entries->picture ?>" alt="image" >
                        <p class="poster_date">uploaded by: <?= $entries->creator ;?> </p>

                        <?php if((Security::isAuthenticated() && $_SESSION['LoggedIn'] == $entries->creator) || Security::isAdmin()){ ?>
                            <p>
                                <a title='delete' href='/post/delete?id=<?=$entries->id?>'>delete</a>
                            </p>
                        <?php } ?>

                        <?php if(Security::isAuthenticated()):?>
                            <p>
                                <a title='comment' href='/comment/showComments?id=<?=$entries->id?>'>show all comments / create comment</a>
                            </p>
                        <?php else :?>
                            <p>
                                <a title='comment' href="/comment/showComments?id=<?=$entries->id?>">show all comments</a>
                            </p>
                        <?php endif; ?>

                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach ?>
    <?php endif ?>
</article>
