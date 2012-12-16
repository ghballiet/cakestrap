<div class="page-header">
  <h2><?= __('Ingredients') ?></h2>
</div>

<div class="row">
  <div class="span3">
	<ul class="well nav nav-list">
	  <li class="nav-header">Ingredients</li>
	  <li><?= $this->Html->link(__('New Ingredient'), array('action'=>'add')) ?></li>
	  <li class="nav-header">Recipes</li>
	  <li><?= $this->Html->link(__('List Recipes'), array('controller'=>'recipes', 'action'=>'index')) ?></li>
	  <li><?= $this->Html->link(__('New Recipe'), array('controller'=>'recipes', 'action'=>'add')) ?></li>
	</ul>
  </div>
  <div class="span9">
<? if(!empty($ingredients)): ?>    <table class="table table-condensed">
	  <tr>
        <th><?= $this->Paginator->sort('id') ?></th>
        <th><?= $this->Paginator->sort('name') ?></th>
        <th><?= $this->Paginator->sort('description') ?></th>
        <th><?= $this->Paginator->sort('modified') ?></th>
        <th class="actions"><?= __('Actions') ?></th>
	  </tr>
<? foreach($ingredients as $ingredient): ?>
      <tr>
        <td><?= h($ingredient['Ingredient']['id']) ?></td>
        <td><?= h($ingredient['Ingredient']['name']) ?></td>
        <td><?= h($ingredient['Ingredient']['description']) ?></td>
        <td><?= h($ingredient['Ingredient']['modified']) ?></td>
        <td class="actions">
		  <div class="btn-group">
		    <a class="btn btn-mini dropdown-toggle btn-primary" data-toggle="dropdown" href="#">
			  Action <span class="caret"></span>
		    </a>
		    <ul class="dropdown-menu pull-right">
			  <li><?= $this->Html->link(__('View'), array('action'=>'view', $ingredient['Ingredient']['id'])) ?></li>
			  <li><?= $this->Html->link(__('Edit'), array('action'=>'edit', $ingredient['Ingredient']['id'])) ?></li>
			  <li><?= $this->Form->postLink(__('Delete'), array('action'=>'delete', $ingredient['Ingredient']['id']), null, __('Are you sure?')) ?></li>
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
      There are no <strong><?= __('Ingredients') ?></strong> in the system.
    </div>  
<? endif; ?>    
  </div>
</div>

<hr>

<div class="alert alert-info">
<?= $this->Paginator->counter(array('format'=>'Page {:page}/{:pages}, showing {:current}/{:count} records, from {:start}-{:end}')) ?></div>

