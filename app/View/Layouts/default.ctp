<!DOCTYPE html>
<html lang="en">
  <head>
<?= $this->fetch('meta') ?>
	<title><?= $title_for_layout ?> | app</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
<?= $this->Html->css('base') ?>
<?= $this->fetch('css') ?>
  </head>
  <body>
    <div class="wrap">
	  <div class="navbar navbar-fixed-top">
	    <div class="navbar-inner">
		  <div class="container">
		  <?= $this->Html->link('app', '/', array('class'=>'brand')) ?>
          <ul class="nav pull-right">
<? if(!isset($user)): ?>
            <li><?= $this->Html->link(__('Sign Up'), array('controller'=>'users', 'action'=>'register')) ?></li>
            <li><?= $this->Html->link(__('Login'), array('controller'=>'users', 'action'=>'login')) ?></li>
<? else: ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?= $user['username'] ?>
                <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <li><?= $this->Html->link(__('Logout'), array('controller'=>'users', 'action'=>'logout')) ?></li>
              </ul>
            </li>
<? endif; ?>
          </ul>
		  </div>
	    </div>
	  </div>
    
	  <div class="container main-content">
<?= $this->Session->flash() ?>
<?= $this->Session->flash('auth') ?>        
<?= $this->fetch('content') ?>
	  </div>

      <div class="push"></div>
    </div>
    
    <div class="footer muted">
      <div class="container">
        Copyright &copy; Company. All Rights Reserved.
      </div>
    </div>
<?
  echo $this->Html->script(array(
	  'jquery.min', 'bootstrap-transition', 'bootstrap-alert',
	  'bootstrap-modal', 'bootstrap-dropdown', 'bootstrap-scrollspy',
	  'bootstrap-tab', 'bootstrap-tooltip', 'bootstrap-popover',
	  'bootstrap-button', 'bootstrap-collapse', 'bootstrap-carousel',
	  'bootstrap-typeahead',
	  'base'
  ));
  echo $this->fetch('scripts');
?>

  </body>
</html>
