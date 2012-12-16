<div class="page-header">
  <h2><?= __('Recipes') ?></h2>
</div>

<div class="row">
  <div class="span3">
	<ul class="well nav nav-list">
	  <li class="nav-header">Recipes</li>
	  <li><?= $this->Html->link(__('New Recipe'), array('action'=>'add')) ?></li>
	  <li class="nav-header">Users</li>
	  <li><?= $this->Html->link(__('List Users'), array('controller'=>'users', 'action'=>'index')) ?></li>
	  <li><?= $this->Html->link(__('New User'), array('controller'=>'users', 'action'=>'add')) ?></li>
	  <li class="nav-header">Ingredients</li>
	  <li><?= $this->Html->link(__('List Ingredients'), array('controller'=>'ingredients', 'action'=>'index')) ?></li>
	  <li><?= $this->Html->link(__('New Ingredient'), array('controller'=>'ingredients', 'action'=>'add')) ?></li>
	</ul>
  </div>
  <div class="span9">
<? if(!empty($recipes)): ?>    <table class="table table-condensed">
	  <tr>
        <th><?= $this->Paginator->sort('id') ?></th>
        <th><?= $this->Paginator->sort('name') ?></th>
        <th><?= $this->Paginator->sort('description') ?></th>
        <th><?= $this->Paginator->sort('user_id') ?></th>
        <th><?= $this->Paginator->sort('public') ?></th>
        <th><?= $this->Paginator->sort('modified') ?></th>
        <th class="actions"><?= __('Actions') ?></th>
	  </tr>
<? foreach($recipes as $recipe): ?>
      <tr>
        <td><?= h($recipe['Recipe']['id']) ?></td>
        <td><?= h($recipe['Recipe']['name']) ?></td>
        <td><?= h($recipe['Recipe']['description']) ?></td>
        <td><?= $this->Html->link($recipe['User']['first_name'], array('controller'=>'users', 'action'=>'view', $recipe['User']['id'])) ?></td>
        <td><?= h($recipe['Recipe']['public']) ?></td>
        <td><?= h($recipe['Recipe']['modified']) ?></td>
        <td class="actions">
		  <div class="btn-group">
		    <a class="btn btn-mini dropdown-toggle btn-primary" data-toggle="dropdown" href="#">
			  Action <span class="caret"></span>
		    </a>
		    <ul class="dropdown-menu pull-right">
			  <li><?= $this->Html->link(__('View'), array('action'=>'view', $recipe['Recipe']['id'])) ?></li>
			  <li><?= $this->Html->link(__('Edit'), array('action'=>'edit', $recipe['Recipe']['id'])) ?></li>
			  <li><?= $this->Form->postLink(__('Delete'), array('action'=>'delete', $recipe['Recipe']['id']), null, __('Are you sure?')) ?></li>
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
      There are no <strong><?= __('Recipes') ?></strong> in the system.
    </div>  
<? endif; ?>    
  </div>
</div>

<hr>

<div class="alert alert-info">
<?= $this->Paginator->counter(array('format'=>'Page {:page}/{:pages}, showing {:current}/{:count} records, from {:start}-{:end}')) ?></div>

