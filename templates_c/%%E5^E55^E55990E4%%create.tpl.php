<?php /* Smarty version 2.6.31, created on 2022-10-05 08:16:25
         compiled from /usr/local/var/www/web_photo/views/category/create.tpl */ ?>
<?php ob_start(); ?>
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Create Category</h3>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" action="/web_photo/index.php?controller=category&action=create" method="post">
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
                    <div class="col-sm-9 col-sm-offset-3">
                        <button type="submit" class="btn btn-primary">Create</button>
                        <a href="/web_photo/index.php?controller=category&action=index" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('context', ob_get_contents());ob_end_clean(); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../templates/layout.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>