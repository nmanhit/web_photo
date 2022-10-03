{capture assign="context"}
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Edit Category</h3>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" action="/web_photo/Controller/category/edit.php" method="post">
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
                <textarea id="id" name="id" hidden value="{$category.id}" placeholder="Id">{$category.id}</textarea>
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="/web_photo/Controller/category/index.php" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
{/capture}
{include file="../templates/layout.tpl"}