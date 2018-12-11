<?php
/** @var $user \X\Model\User */
$vars = get_defined_vars();
$user = $vars['user'];
?>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
  <div class="navbar-header">
    <a class="navbar-brand" href="index.php">Goku</a>
  </div>
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-right">
      <?php if ( 1 == $user->is_admin ): ?>
      <li><a href="index.php?module=web&action=admin/project/index">Admin</a></li>
      <?php endif; ?>
      <li class="dropdown">
        <a href="#" 
           class="dropdown-toggle" 
           data-toggle="dropdown" 
        ><?php echo $user->name; ?> &nbsp;<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="index.php?module=web&action=user/profile">Profile</a></li>
          <li><a href="index.php?module=web&action=user/setting">Setting</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="index.php?module=web&action=user/logout">Logout</a></li>
        </ul>
      </li>
    </ul>
  </div>
</div>
</nav>

<!-- 确认对话框  -->
<div class="modal fade" id="goku-dialog-confirm" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">操作确认</h4>
      </div>
      <div class="modal-body" id="goku-dialog-confirm-content"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <a href="#" class="btn btn-primary" id="goku-dialog-confirm-yes-url">确定</a>
      </div>
    </div>
  </div>
</div>