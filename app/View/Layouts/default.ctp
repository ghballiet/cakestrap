<!DOCTYPE html>
<html lang="en">
  <head>
<? echo $this->fetch('meta'); ?>
	<title><? echo $title_for_layout; ?> | app</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
<? echo $this->Html->css('base'); ?>
<? echo $this->fetch('css'); ?>
  </head>
  <body>
	<div class="navbar navbar-fixed-top">
	  <div class="navbar-inner">
		<div class="container">
		  <? echo $this->Html->link('app', '/', array('class'=>'brand')); ?>		 
		</div>
	  </div>
	</div>

	<div class="container">
<? echo $this->Session->flash(); ?>
<? echo $this->fetch('content'); ?>
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
