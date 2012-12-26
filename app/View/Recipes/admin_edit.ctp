<div class="page-header">
  <h2><?= __('Admin Edit Recipe') ?></h2>
</div>

<div class="row">
  <div class="span3">
	<ul class="well nav nav-list">
	  <li class="nav-header">Actions</li>
	  <li><?= $this->Form->postLink(__('Delete'), array('action'=>'delete', $this->Form->value('Recipe.id')), null, __('Are you sure?')) ?></li>
	  <li><?= $this->Html->link(__('List Recipes'), array('action'=>'index')) ?></li>
	  <li class="nav-header"><?= __('Users'); ?></li>
	  <li><?= $this->Html->link(__('List Users'), array('controller'=>'users', 'action'=>'index')) ?></li>
	  <li><?= $this->Html->link(__('New User'), array('controller'=>'users', 'action'=> 'add')) ?></li>
	</ul>
  </div>
  <div class="span9">
    <?= $this->Form->create('Recipe') ?>
    <?= $this->Form->input('id') ?>
    <?= $this->Form->input('name', array('autofocus'=>'true')) ?>
    <?= $this->Form->input('description') ?>
    <?= $this->Form->input('user_id') ?>
    <?= $this->Form->input('public') ?>
    <?= $this->Form->end(__('Submit')) ?>
  </div>
</div>