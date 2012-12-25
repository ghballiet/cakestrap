<div class="page-header">
  <h2><?= __('Edit User') ?></h2>
</div>

<div class="row">
  <div class="span3">
    <ul class="well nav nav-list">
      <li class="nav-header">Actions</li>
      <li><?= $this->Form->postLink(__('Delete'), array('action'=>'delete', $this->Form->value('User.id')), null, __('Are you sure?')) ?></li>
      <li><?= $this->Html->link(__('List Users'), array('action'=>'index')) ?></li>
    </ul>
  </div>
  <div class="span9">
<?= $this->Form->create('User') ?><?= $this->Form->input('id') ?><?= $this->Form->input('first_name', array('autofocus'=>'true')); ?><?= $this->Form->input('last_name') ?><?= $this->Form->input('email') ?><?= $this->Form->input('username') ?><?= $this->Form->input('admin') ?><?= $this->Form->end(__('Submit')) ?>    
  </div>
</div>