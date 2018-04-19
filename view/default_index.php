

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
    <img src="images/post1.jpg" width="280" height="280" title="post1" alt="post1" />
    <img src="images/post2.jpg" width="280" height="280" title="post2" alt="post2" />
    <img src="images/post3.jpg" width="280" height="280" title="post3" alt="post3" />
    <img src="images/post4.jpg" width="280" height="280" title="post4" alt="post4" />

</div>
