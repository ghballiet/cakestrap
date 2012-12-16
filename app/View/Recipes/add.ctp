<div class="page-header">
  <h2><?= __('Add Recipe') ?></h2>
</div>

<div class="row">
  <div class="span3">
    <ul class="well nav nav-list">
      <li class="nav-header">Actions</li>
      <li><?= $this->Html->link(__('List Recipes'), array('action'=>'index')) ?></li>
      <li class="nav-header"><?= __('Users'); ?></li>
      <li><?= $this->Html->link(__('List Users'), array('controller'=>'users', 'action'=>'index')) ?></li>
      <li><?= $this->Html->link(__('New User'), array('controller'=>'users', 'action'=> 'add')) ?></li>
    </ul>
  </div>
  <div class="span9">
<?= $this->Form->create('Recipe') ?><?= $this->Form->input('name', array('autofocus'=>'true')); ?><?= $this->Form->input('description') ?><?= $this->Form->input('public') ?><?= $this->Form->input('user_id') ?><?= $this->Form->end(__('Submit')) ?>    
  </div>
</div>