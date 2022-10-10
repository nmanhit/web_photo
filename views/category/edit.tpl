{capture assign="context"}
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Edit Category</h3>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" enctype="multipart/form-data" action="{$BASE_URL}index.php?controller=category&action=edit" method="POST">
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Name <span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" id="name" name="name" placeholder="name" class="form-control" value="{$category.name}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Description</label>
                    <div class="col-sm-9">
                        <textarea rows="5" id="description" name="description" placeholder="Description" class="form-control">{$category.description}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Photo</label>
                    <div class="col-sm-9">
                        <img src="static/upload/{$category.photo}" alt="category-photo" style="max-width: 100%; max-height: 300px" class="img-fluid">
                        <input type="file" class="form-control" id="photo" name="photo" accept="image/png, image/gif, image/jpeg" />
                    </div>
                </div>
                <input id="id" name="id" type="hidden" value="{$category.id}" placeholder="Id" />
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{$BASE_URL}index.php?controller=category&action=index" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
                <input type="hidden" name="token" value="{$token}" />
            </form>
        </div>
    </div>
{/capture}
{include file="../templates/layout.tpl"}