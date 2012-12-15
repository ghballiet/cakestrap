<div class="page-header">
  <h2><?= __('Recipes') ?></h2>
</div>

<table class="table table-condensed">
  <thead>
	<tr>
	  <th><?= $this->Paginator->sort('id') ?></th>
	  <th><?= $this->Paginator->sort('name') ?></th>
	  <th><?= $this->Paginator->sort('description') ?></th>
	  <th><?= $this->Paginator->sort('public') ?></th>
	  <th><?= $this->Paginator->sort('user_id') ?></th>
	  <th><?= $this->Paginator->sort('modified') ?></th>
	  <th class="actions"><?= __('Actions') ?></th>
	</tr>
  </thead>
  <tbody>
<? foreach($recipes as $recipe): ?>
	<tr>
      <td><?= h($recipe['Recipe']['id']) ?></td>
      <td><?= h($recipe['Recipe']['name']) ?></td>
      <td><?= h($recipe['Recipe']['description']) ?></td>
      <td><?= h($recipe['Recipe']['public']) ?></td>
      <td><?= $this->Html->link($recipe['User']['name'], array('controller'=>'users', 'action'=>'view', $recipe['User']['id'])) ?></td>
      <td><?= h($recipe['Recipe']['modified']) ?></td>

      <td class="actions">
        <div class="btn-group">
          <a class="btn btn-mini dropdown-toggle btn-primary" data-toggle="dropdown" href="#">
            Action <span class="caret"></span>
          </a>
          <ul class="dropdown-menu pull-right">
            <li><?= $this->Html->link(__('View'), array('action'=>'view', $recipe['Recipe']['id'])) ?></li>
            <li><?= $this->Html->link(__('Edit'), array('action'=>'view', $recipe['Recipe']['id'])) ?></li>
            <li><?= $this->Form->postLink(__('Delete'), array('action'=>'delete', $recipe['Recipe']['id']), null, __('Are you sure?')) ?></li>
          </ul>
        </div>
      </td>
	</tr>
<? endforeach; ?>
  </tbody>
</table>

<ul class="pager">
  <?= $this->Paginator->prev('Previous', array('tag'=>'li', 'class'=>'previous'), '<a>Previous</a>', array('class'=>'previous disabled', 'tag'=>'li')) ?>
  <?= $this->Paginator->next('Next', array('tag'=>'li', 'class'=>'next'), '<a>Next</a>', array('class'=>'next disabled', 'tag'=>'li')) ?>
</ul>

<hr>

<div class="row">
  <div class="span4">
	<ul class="well nav nav-list">
	  <li class="nav-header">Recipes</li>
	  <li><?= $this->Html->link(__('New Recipe'), array('action'=>'add')) ?></li>
	  <li class="nav-header">Users</li>
	  <li><?= $this->Html->link(__('List Users'), array('controller'=>'users', 'action'=>'index')) ?></li>
	  <li><?= $this->Html->link(__('New User'), array('controller'=>'users', 'action'=>'new')) ?></li>
	</ul>
  </div>
  <div class="span8">
	<div class="alert alert-info">
<?= $this->Paginator->counter(array('format'=>'Page {:page}/{:pages}, showing {:current}/{:count} records, from {:start}-{:end}')) ?>	</div>
  </div>
</div>
