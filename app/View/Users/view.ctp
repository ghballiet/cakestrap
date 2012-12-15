
<div class="page-header">
  <h2><?= __('User'); ?></h2>
</div>

<div class="row">
  <div class="span4">
    <ul class="well nav nav-list">
      <li class="nav-header"><?= __('User') ?> Actions</li>
      <li><?= $this->Html->link(__('Edit User'), array('action'=>'edit', $user['User']['id'])) ?></li>
      <li><?= $this->Form->postLink(__('Delete User'), array('action'=>'delete', $user['User']['id']), null, __('Are you sure?')) ?></li>
      <li><?= $this->Html->link(__('List Users'), array('action'=>'index')) ?></li>
      <li><?= $this->Html->link(__('New User'), array('action'=>'add')) ?></li>
      <li class="nav-header"><?= __('recipes') ?></li>
      <li><?= $this->Html->link(__('List Recipes'), array('controller'=>'recipes', 'action'=>'index')) ?></li>
      <li><?= $this->Html->link(__('New Recipe'), array('controller'=>'recipes', 'action'=>'add')) ?></li>
    </ul>
  </div>
  <div class="span8">
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
        <th><?= __('Username') ?></th>
        <td><?= h($user['User']['username']) ?></td>
      </tr>      
      <tr>      
        <th><?= __('Email') ?></th>
        <td><?= h($user['User']['email']) ?></td>
      </tr>      
      <tr>      
        <th><?= __('Password') ?></th>
        <td><?= h($user['User']['password']) ?></td>
      </tr>      
      <tr>      
        <th><?= __('Admin') ?></th>
        <td><?= h($user['User']['admin']) ?></td>
      </tr>      
      <tr>      
        <th><?= __('Verified') ?></th>
        <td><?= h($user['User']['verified']) ?></td>
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
  <li class="active"><a href="#recipes" data-toggle="tab"><?= __('Related Recipes') ?></a></li>
</ul>

<div class="tab-content">
  <div class="tab-pane active" id="recipes">
<? if(!empty($user['Recipe'])): ?>
    <table class="table table-condensed">
      <tr>
        <th><?= __('Id') ?></th>
        <th><?= __('Name') ?></th>
        <th><?= __('Description') ?></th>
        <th><?= __('Public') ?></th>
        <th><?= __('User Id') ?></th>
        <th><?= __('Modified') ?></th>
        <th class="actions"><?= __('Actions') ?></th>
      </tr>
<? foreach($user['Recipe'] as $recipe): ?>
	<tr>
      <td><?= h($recipe['id']) ?></td>
      <td><?= h($recipe['name']) ?></td>
      <td><?= h($recipe['description']) ?></td>
      <td><?= h($recipe['public']) ?></td>
      <td><?= h($recipe['user_id']) ?></td>
      <td><?= h($recipe['modified']) ?></td>
      <td class="actions">
        <div class="btn-group">
          <a class="btn btn-mini dropdown-toggle btn-primary" data-toggle="dropdown" href="#">
            Action <span class="caret"></span>
          </a>
          <ul class="dropdown-menu pull-right">
            <li><?= $this->Html->link(__('View'), array('controller'=>'recipes', 'action'=>'view', $recipe['id'])) ?></li>
            <li><?= $this->Html->link(__('Edit'), array('controller'=>'recipes', 'action'=>'edit', $recipe['id'])) ?></li>
            <li><?= $this->Form->postLink(__('Delete'), array('controller'=>'recipes', 'action'=>'delete', $recipe['id']), null, __('Are you sure?')) ?></li>
          </ul>
        </div>
      </td>
	</tr>
<? endforeach; ?>
    </table>
<? else: ?>
    <div class="alert alert-info">
      There are no <strong><?= __('Recipes') ?></strong> related to this <strong><?= __('User') ?></strong>.
    </div>
<? endif; ?>
  </div>
  
</div>
