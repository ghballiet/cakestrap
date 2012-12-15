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
<?
foreach($fields as $field) {
	$is_key = false;
	if(!empty($associations['belongsTo'])) {
		foreach($associations['belongsTo'] as $alias => $details) {
			$display = $details['displayField'];
			$controller = $details['controller'];
			$primary_key = $details['primaryKey'];
			if($field === $details['foreignKey']) {
				$is_key = true;
				echo "        <td>\n          <?= ";
				echo "\$this->Html->link(\${$singularVar}['{$alias}']['{$displayField}'], ";
				echo "array('controller'=>'{$controller}', 'action'=>'view', \${$singularVar}['{$alias}']['{$primaryKey}'])); ";
				echo "?>\n        </td>\n";
				break;
			}
		}
	}
	if($is_key !== true)
		echo "        <td><?= h(\${$singularVar}['{$modelClass}']['{$field}']) ?></td>\n";
}
echo "        <td class=\"actions\">\n";
echo "          <?= \$this->Html->link(__('View'), array('action'=>'view', \${$singularVar}['{$modelClass}']['{$primaryKey}'])) ?>\n";
echo "          <?= \$this->Html->link(__('Edit'), array('action'=>'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}'])) ?>\n";
echo "          <?= \$this->Form->postLink(__('Delete'), array('action'=>'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), null, __('Are you sure?')) ?>\n";
echo "        </td>\n";
?>
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
