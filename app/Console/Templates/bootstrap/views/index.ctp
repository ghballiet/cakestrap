<? $sv = $singularVar; ?>
<div class="page-header">
  <h2><?= "<?= __('{$pluralHumanName}') ?>" ?></h2>
</div>

<table class="table table-condensed">
  <thead>
	<tr>
<? foreach($fields as $field): ?>
	  <th><?= "<?= \$this->Paginator->sort('{$field}') ?>" ?></th>
<? endforeach; ?>
	  <th class="actions"><?= "<?= __('Actions') ?>" ?></th>
	</tr>
  </thead>
  <tbody>
<?= "<? foreach(\${$pluralVar} as \${$singularVar}): ?>\n" ?>
	<tr>
<? foreach($fields as $field): ?>
<? $is_key = false; ?>
<? if(!empty($associations['belongsTo'])): ?>
<? foreach($associations['belongsTo'] as $alias => $details): ?>
<? if($field === $details['foreignKey']): ?>
<? $display = $details['displayField']; ?>
<? $cont = $details['controller']; ?>
<? $pk = $details['primaryKey']; ?>
<? $is_key = true; ?>
      <td><?= "<?= \$this->Html->link(\${$sv}['{$alias}']['{$display}'], array('controller'=>'{$cont}', 'action'=>'view', \${$sv}['{$alias}']['{$pk}'])) ?>" ?></td>
<? endif; ?>
<? endforeach; ?>
<? endif; ?>
<? if($is_key !== true): ?>
      <td><?= "<?= h(\${$singularVar}['{$modelClass}']['{$field}']) ?>" ?></td>
<? endif; ?>
<? endforeach; ?>
<? $pk = $primaryKey; ?>

      <td class="actions">
        <div class="btn-group">
          <a class="btn btn-mini dropdown-toggle btn-primary" data-toggle="dropdown" href="#">
            Action <span class="caret"></span>
          </a>
          <ul class="dropdown-menu pull-right">
            <li><?= "<?= \$this->Html->link(__('View'), array('action'=>'view', \${$sv}['{$modelClass}']['{$pk}'])) ?>" ?></li>
            <li><?= "<?= \$this->Html->link(__('Edit'), array('action'=>'view', \${$sv}['{$modelClass}']['{$pk}'])) ?>" ?></li>
            <li><?= "<?= \$this->Form->postLink(__('Delete'), array('action'=>'delete', \${$sv}['{$modelClass}']['{$pk}']), null, __('Are you sure?')) ?>" ?></li>
          </ul>
        </div>
      </td>
	</tr>
<?= "<? endforeach; ?>\n" ?>
  </tbody>
</table>

<ul class="pager">
  <?= "<?= \$this->Paginator->prev('Previous', array('tag'=>'li', 'class'=>'previous'), '<a>Previous</a>', array('class'=>'previous disabled', 'tag'=>'li')) ?>\n" ?>
  <?= "<?= \$this->Paginator->next('Next', array('tag'=>'li', 'class'=>'next'), '<a>Next</a>', array('class'=>'next disabled', 'tag'=>'li')) ?>\n" ?>
</ul>

<hr>

<div class="row">
  <div class="span4">
	<ul class="well nav nav-list">
	  <li class="nav-header"><?= __($pluralHumanName) ?></li>
	  <li><?= "<?= \$this->Html->link(__('New {$singularHumanName}'), array('action'=>'add')) ?>" ?></li>
<? $done = array(); ?>
<? foreach($associations as $type => $data): ?>
<? foreach($data as $alias => $details): ?>
<? if($details['controller'] != $this->name && !in_array($details['controller'], $done)): ?>
<? $cont = $details['controller']; ?>
<? $hcont = Inflector::humanize($cont); ?>
<? $halias = Inflector::humanize(Inflector::underscore($alias)); ?>
	  <li class="nav-header"><?= __($hcont) ?></li>
	  <li><?= "<?= \$this->Html->link(__('List {$hcont}'), array('controller'=>'{$cont}', 'action'=>'index')) ?>" ?></li>
	  <li><?= "<?= \$this->Html->link(__('New {$halias}'), array('controller'=>'{$cont}', 'action'=>'new')) ?>" ?></li>
<? $done[] = $cont; ?>
<? endif; ?>
<? endforeach; ?>
<? endforeach; ?>
	</ul>
  </div>
  <div class="span8">
	<div class="alert alert-info">
<?= "<?= \$this->Paginator->counter(array('format'=>'Page {:page}/{:pages}, showing {:current}/{:count} records, from {:start}-{:end}')) ?>" ?>
	</div>
  </div>
</div>
