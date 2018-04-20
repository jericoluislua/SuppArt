<form class="form-horizontal" action="/upload/doUpload" method="post" enctype="multipart/form-data">
    <div class="component" data-html="true">
        <div class="form-group">
            <label class="col-md-2 control-label" for="picture">Picture</label>
            <div class="col-md-4">
                <input id="picture" name="picture" type="file" placeholder="Picture" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label" for="title">Title</label>
            <div class="col-md-4">
                <input id="title" name="title" placeholder="Title" class="form-control input-md" required>
            </div>
        </div>
        <div class="form-group">
            <p>
                <label class="col-md-2 control-label" for="private">Private</label>
                <input id="private" name="private" type="checkbox" value="true" placeholder="">
            </p>

            <p>
                <label class="col-md-2 control-label" for="drawing">Drawing</label>
                <input id="drawing" name="drawing" type="checkbox" value="true" placeholder="">
            </p>
            <!--
            <p>
                <label class="col-md-2 control-label" for="photograph">Photograph</label>
                <input id="photograph" name="photograph" type="checkbox" value="true" placeholder="">
            </p>
                <!-- <input id="scenery" name="scenery" type="checkbox" value="true" placeholder="">
                <input id="portrait" name="portrait" type="checkbox" value="true" placeholder=""> -->
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label" for="send">&nbsp;</label>
            <div class="col-md-4">
                <input id="send" name="send" type="submit" class="btn btn-primary" value="upload">
            </div>
        </div>
    </div>
</form>