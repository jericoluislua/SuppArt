

<div class="mid-section">
    <h1 id="headings"><?= $heading ?></h1>
</div>
<div class="content-title">
    <h4 class="subtitles2">Check out recent posts</h4>
</div>
<div class="content">
    <p> <?php

        if(isset($_SESSION['LoggedIn'])) {
            echo 'session started';
        }else{
            echo 'session not found';
        }

        ?></p>
    <?php include_once('post_index.php');?>

</div>
