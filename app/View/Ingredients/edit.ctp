<div class="page-header">
  <h2><?= __('Edit Ingredient') ?></h2>
</div>

<div class="row">
  <div class="span3">
    <ul class="well nav nav-list">
      <li class="nav-header">Actions</li>
      <li><?= $this->Form->postLink(__('Delete'), array('action'=>'delete', $this->Form->value('Ingredient.id')), null, __('Are you sure?')) ?></li>
      <li><?= $this->Html->link(__('List Ingredients'), array('action'=>'index')) ?></li>
      <li class="nav-header"><?= __('Recipes'); ?></li>
      <li><?= $this->Html->link(__('List Recipes'), array('controller'=>'recipes', 'action'=>'index')) ?></li>
      <li><?= $this->Html->link(__('New Recipe'), array('controller'=>'recipes', 'action'=> 'add')) ?></li>
    </ul>
  </div>
  <div class="span9">
<?= $this->Form->create('Ingredient') ?><?= $this->Form->input('id') ?><?= $this->Form->input('name', array('autofocus'=>'true')); ?><?= $this->Form->input('description') ?><?= $this->Form->input('Recipe') ?><?= $this->Form->end(__('Submit')) ?>    
  </div>
</div>