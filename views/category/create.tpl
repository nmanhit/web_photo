{capture assign="context"}
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Create Category</h3>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" enctype="multipart/form-data" action="{$BASE_URL}/index.php?controller=category&action=create" method="post">
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Name <span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" id="name" name="name" placeholder="Name" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Description</label>
                    <div class="col-sm-9">
                        <textarea rows="5" id="description" name="description" placeholder="Description" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Photo</label>
                    <div class="col-sm-9">
                        <div class="icon-upload-file">
                            <img id="img-preview" alt="choose photo" title="choose photo" src="{$IMG_PREVIEW_DEFAULT}">
                            <div class="text">Choose Photo</div>
                            <input type="file" type="hidden" id="photo" name="photo" accept="image/png, image/gif, image/jpeg" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <button type="submit" class="btn btn-primary">Create</button>
                        <a href="{$BASE_URL}/index.php?controller=category&action=index" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
{/capture}
{include file="../templates/layout.tpl"}