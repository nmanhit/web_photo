<?php /* Smarty version 2.6.31, created on 2022-10-07 08:34:23
         compiled from menu.tpl */ ?>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">aPhoto</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/index.php?controller=category&action=index">Categories</a></li>
                <li><a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
Controller/user/sign_up.php">User</a></li>
                <li><a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
Controller/photo/index.php">My Photo</a></li>
            </ul>

            <form class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="text" placeholder="Email" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Password" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Log in</button>
                <a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
index.php?controller=user&action=create" class="btn btn-primary">Sign up</a>
            </form>
        </div><!--/.nav-collapse -->
    </div>
</nav>