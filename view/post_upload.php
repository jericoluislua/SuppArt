<form class="form-horizontal" action="/upload/upload" method="post" enctype="multipart/form-data">
    <div class="component" data-html="true">
        <div class="form-group">
            <label class="col-md-2 control-label" for="picture">Picture</label>
            <div class="col-md-4">
                <input id="picture" name="fileToUpload" type="file" placeholder="Picture" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label" for="title">Title</label>
            <div class="col-md-4">
                <input id="title" name="title" placeholder="Title" class="form-control input-md" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label" for="private">Private</label>
            <div class="col-md-4">
                <input id="private" name="private" type="checkbox" value="true" placeholder="">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label" for="send">&nbsp;</label>
            <div class="col-md-4">
                <input id="send" name="send" type="submit" class="btn btn-primary" value="upload">
            </div>
        </div>
        <a href='/upload/post_index.php'>lets see uploads</a>
    </div>
</form>