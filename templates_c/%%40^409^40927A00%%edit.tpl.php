<?php /* Smarty version 2.6.31, created on 2022-10-03 02:53:01
         compiled from ../views/category/edit.tpl */ ?>
<?php ob_start(); ?>
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Edit Category</h3>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" action="/web_photo/Controller/category/edit.php" method="post">
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Name <span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" id="name" name="name" placeholder="name" class="form-control" value="<?php echo $this->_tpl_vars['category']['name']; ?>
">
                    </div>
                </div>
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Description</label>
                    <div class="col-sm-9">
                        <textarea rows="5" id="description" name="description" placeholder="Description" class="form-control"><?php echo $this->_tpl_vars['category']['description']; ?>
</textarea>
                    </div>
                </div>
                <input id="id" name="id" type="hidden" value="<?php echo $this->_tpl_vars['category']['id']; ?>
" placeholder="Id" />
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="/web_photo/Controller/category/index.php" class="btn btn-danger">Cancel</a>
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