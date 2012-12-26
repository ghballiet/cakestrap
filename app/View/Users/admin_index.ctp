<div class="page-header">
  <h2><?= __('Users') ?></h2>
</div>

<div class="row">
  <div class="span3">
	<ul class="well nav nav-list">
	  <li class="nav-header">Users</li>
	  <li><?= $this->Html->link(__('New User'), array('action'=>'add')) ?></li>
	  <li class="nav-header">Recipes</li>
	  <li><?= $this->Html->link(__('List Recipes'), array('controller'=>'recipes', 'action'=>'index')) ?></li>
	  <li><?= $this->Html->link(__('New Recipe'), array('controller'=>'recipes', 'action'=>'add')) ?></li>
	</ul>
  </div>
  <div class="span9">
<? if(!empty($users)): ?>    <table class="table table-condensed">
	  <tr>
        <th><?= $this->Paginator->sort('id') ?></th>
        <th><?= $this->Paginator->sort('first_name') ?></th>
        <th><?= $this->Paginator->sort('last_name') ?></th>
        <th><?= $this->Paginator->sort('email') ?></th>
        <th><?= $this->Paginator->sort('username') ?></th>
        <th><?= $this->Paginator->sort('password') ?></th>
        <th><?= $this->Paginator->sort('role') ?></th>
        <th><?= $this->Paginator->sort('modified') ?></th>
        <th class="actions"><?= __('Actions') ?></th>
	  </tr>
<? foreach($users as $user): ?>
      <tr>
        <td><?= h($user['User']['id']) ?></td>
        <td><?= h($user['User']['first_name']) ?></td>
        <td><?= h($user['User']['last_name']) ?></td>
        <td><?= h($user['User']['email']) ?></td>
        <td><?= h($user['User']['username']) ?></td>
        <td><?= h($user['User']['password']) ?></td>
        <td><?= h($user['User']['role']) ?></td>
        <td><?= h($user['User']['modified']) ?></td>
        <td class="actions">
		  <div class="btn-group">
		    <a class="btn btn-mini dropdown-toggle btn-primary" data-toggle="dropdown" href="#">
			  Action <span class="caret"></span>
		    </a>
		    <ul class="dropdown-menu pull-right">
			  <li><?= $this->Html->link(__('View'), array('action'=>'view', $user['User']['id'])) ?></li>
			  <li><?= $this->Html->link(__('Edit'), array('action'=>'edit', $user['User']['id'])) ?></li>
			  <li><?= $this->Form->postLink(__('Delete'), array('action'=>'delete', $user['User']['id']), null, __('Are you sure?')) ?></li>
		    </ul>
		  </div>
	    </td>
	  </tr>
<? endforeach; ?>
    </table>
    <ul class="pager">
      <?= $this->Paginator->prev('Previous', array('tag'=>'li', 'class'=>'previous'), '<a>Previous</a>', array('class'=>'previous disabled', 'tag'=>'li')) ?>
      <?= $this->Paginator->next('Next', array('tag'=>'li', 'class'=>'next'), '<a>Next</a>', array('class'=>'next disabled', 'tag'=>'li')) ?>
    </ul>
<? else: ?>    <div class="alert alert-info">
      There are no <strong><?= __('Users') ?></strong> in the system.
    </div>  
<? endif; ?>    
  </div>
</div>

<hr>

<div class="alert alert-info">
<?= $this->Paginator->counter(array('format'=>'Page {:page}/{:pages}, showing {:current}/{:count} records, from {:start}-{:end}')) ?></div>

