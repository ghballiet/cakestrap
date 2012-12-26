
<div class="page-header">
  <h2><?= __('Recipe'); ?></h2>
</div>

<div class="row">
  <div class="span3">
    <ul class="well nav nav-list">
      <li class="nav-header"><?= __('Recipe') ?> Actions</li>
      <li><?= $this->Html->link(__('Edit Recipe'), array('action'=>'edit', $recipe['Recipe']['id'])) ?></li>
      <li><?= $this->Form->postLink(__('Delete Recipe'), array('action'=>'delete', $recipe['Recipe']['id']), null, __('Are you sure?')) ?></li>
      <li><?= $this->Html->link(__('List Recipes'), array('action'=>'index')) ?></li>
      <li><?= $this->Html->link(__('New Recipe'), array('action'=>'add')) ?></li>
      <li class="nav-header"><?= __('users') ?></li>
      <li><?= $this->Html->link(__('List Users'), array('controller'=>'users', 'action'=>'index')) ?></li>
      <li><?= $this->Html->link(__('New User'), array('controller'=>'users', 'action'=>'add')) ?></li>
    </ul>
  </div>
  <div class="span9">
    <table class="table table-condensed">
      <tr>      
        <th><?= __('Id') ?></th>
        <td><?= h($recipe['Recipe']['id']) ?></td>
      </tr>      
      <tr>      
        <th><?= __('Name') ?></th>
        <td><?= h($recipe['Recipe']['name']) ?></td>
      </tr>      
      <tr>      
        <th><?= __('Description') ?></th>
        <td><?= h($recipe['Recipe']['description']) ?></td>
      </tr>      
      <tr>      
        <th><?= __('User') ?></th>
        <td><?= $this->Html->link($recipe['User']['id'], array('controller'=>'users', 'action'=>'view', $recipe['User']['id'])) ?></td>
      </tr>      
      <tr>      
        <th><?= __('Public') ?></th>
        <td><?= h($recipe['Recipe']['public']) ?></td>
      </tr>      
      <tr>      
        <th><?= __('Modified') ?></th>
        <td><?= h($recipe['Recipe']['modified']) ?></td>
      </tr>      
    </table>
  </div>
</div>

<hr>

<ul class="nav nav-tabs">
  <li class="active"><a href="#users" data-toggle="tab"><?= __('Related Users') ?></a></li>
</ul>

<div class="tab-content">
  <div class="tab-pane active" id="users">
<? if(!empty($recipe['User'])): ?>
    <table class="table table-condensed">
      <tr>
        <th><?= __('Id') ?></th>
        <th><?= __('First Name') ?></th>
        <th><?= __('Last Name') ?></th>
        <th><?= __('Email') ?></th>
        <th><?= __('Username') ?></th>
        <th><?= __('Password') ?></th>
        <th><?= __('Role') ?></th>
        <th><?= __('Modified') ?></th>
        <th class="actions"><?= __('Actions') ?></th>
      </tr>
    <tr>
      <td><?= h($recipe['User']['id']) ?></td>
      <td><?= h($recipe['User']['first_name']) ?></td>
      <td><?= h($recipe['User']['last_name']) ?></td>
      <td><?= h($recipe['User']['email']) ?></td>
      <td><?= h($recipe['User']['username']) ?></td>
      <td><?= h($recipe['User']['password']) ?></td>
      <td><?= h($recipe['User']['role']) ?></td>
      <td><?= h($recipe['User']['modified']) ?></td>
      <td class="actions">
        <div class="btn-group">
          <a class="btn btn-mini dropdown-toggle btn-primary" data-toggle="dropdown" href="#">
            Action <span class="caret"></span>
          </a>
          <ul class="dropdown-menu pull-right">
            <li><?= $this->Html->link(__('View'), array('controller'=>'users', 'action'=>'view', $recipe['User']['id'])) ?></li>
            <li><?= $this->Html->link(__('Edit'), array('controller'=>'users', 'action'=>'edit', $recipe['User']['id'])) ?></li>
            <li><?= $this->Form->postLink(__('Delete'), array('controller'=>'users', 'action'=>'delete', $recipe['User']['id']), null, __('Are you sure?')) ?></li>
          </ul>
        </div>
      </td>
    </tr>
    </table>
<? else: ?>
    <div class="alert alert-info">
      There are no <strong><?= __('Users') ?></strong> related to this <strong><?= __('Recipe') ?></strong>.
    </div>
<? endif; ?>
  </div>
  
</div>
