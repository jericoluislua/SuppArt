

<div class="mid-section">
    <h1 id="headings"><?= $heading ?></h1>
</div>
<div class="content-title">
    <h4 class="subtitles2">Check out recent posts</h4>
</div>
<div class="content">
    <p>
        <?php

        if(isset($_SESSION['LoggedIn'])) {
            echo 'Welcome ' . $_SESSION['LoggedIn'];

        }
        elseif(isset($loggedOut)){
            echo 'Succesfully logged out. Welcome Guest.';
        }

        ?>
    </p>
    <?php include_once('post_index.php');?>

</div>
