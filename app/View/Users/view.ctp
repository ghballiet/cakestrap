
<div class="page-header">
  <h2><?= __('User'); ?></h2>
</div>

<div class="row">
  <div class="span3">
    <ul class="well nav nav-list">
      <li class="nav-header"><?= __('User') ?> Actions</li>
      <li><?= $this->Html->link(__('Edit User'), array('action'=>'edit', $user['User']['id'])) ?></li>
      <li><?= $this->Form->postLink(__('Delete User'), array('action'=>'delete', $user['User']['id']), null, __('Are you sure?')) ?></li>
      <li><?= $this->Html->link(__('List Users'), array('action'=>'index')) ?></li>
      <li><?= $this->Html->link(__('New User'), array('action'=>'add')) ?></li>
    </ul>
  </div>
  <div class="span9">
    <table class="table table-condensed">
      <tr>      
        <th><?= __('Id') ?></th>
        <td><?= h($user['User']['id']) ?></td>
      </tr>      
      <tr>      
        <th><?= __('First Name') ?></th>
        <td><?= h($user['User']['first_name']) ?></td>
      </tr>      
      <tr>      
        <th><?= __('Last Name') ?></th>
        <td><?= h($user['User']['last_name']) ?></td>
      </tr>      
      <tr>      
        <th><?= __('Email') ?></th>
        <td><?= h($user['User']['email']) ?></td>
      </tr>      
      <tr>      
        <th><?= __('Username') ?></th>
        <td><?= h($user['User']['username']) ?></td>
      </tr>      
      <tr>      
        <th><?= __('Admin') ?></th>
        <td><?= h($user['User']['admin']) ?></td>
      </tr>      
      <tr>      
        <th><?= __('Modified') ?></th>
        <td><?= h($user['User']['modified']) ?></td>
      </tr>      
    </table>
  </div>
</div>

<hr>

<ul class="nav nav-tabs">
</ul>

<div class="tab-content">
  
</div>
