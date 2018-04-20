<!-- Form to edit the Title of certain Blogs gets generates here-->

<form class="form-horizontal" action="/post/changeTitle?id=<?php echo $id?>" method="post">
    <div class="component" data-html="true">
        <div class="form-group">
            <label class="col-md-2 control-label" for="title">New title</label>
            <div class="col-md-4">
                <input id="title" name="title" type="text" placeholder="Title" class="form-control input-md" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label" for="send">&nbsp;</label>
            <div class="col-md-4">
                <input id="send" name="send" type="submit" class="btn btn-primary" value="update">
            </div>
        </div>
    </div>
</form>