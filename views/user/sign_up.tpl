{capture assign="context"}
    <div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title">Registration</h3>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" enctype="multipart/form-data" action="{$BASE_URL}index.php?controller=user&action=create" method="post">
            <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Email <span class="required">*</span></label>
                <div class="col-sm-9">
                    <input type="email" name="email" id="email" placeholder="Email" class="form-control" autofocus />
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-3 control-label">Password <span class="required">*</span></label>
                <div class="col-sm-9">
                    <input type="password" name="password" id="password" placeholder="Password" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label for="firstName" class="col-sm-3 control-label">Full Name</label>
                <div class="col-sm-9">
                    <input type="text" name="fullName" id="fullName" placeholder="Full Name" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label for="avatar" class="col-sm-3 control-label">Avatar</label>
                <div class="col-sm-9">
                    <input type="file" id="avatar" name="avatar" accept="image/png, image/gif, image/jpeg" />
                </div>
            </div>
            <input type="hidden" name="token" value="{$token}" />
            <div class="form-group">
                <div class="col-sm-9 col-sm-offset-3">
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                </div>
            </div>

        </form>
    </div>
</div>
{/capture}
{include file="../templates/layout.tpl"}