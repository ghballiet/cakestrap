<div class="page-header">
  <h2><? printf("<?= __('%s %s') ?>", Inflector::humanize($action), $singularHumanName); ?></h2>
</div>

<div class="row">
  <div class="span3">
	<ul class="well nav nav-list">
	  <li class="nav-header">Actions</li>
<? if(strpos($action, 'add') === false): ?>
	  <li><?= "<?= \$this->Form->postLink(__('Delete'), array('action'=>'delete', \$this->Form->value('{$modelClass}.{$primaryKey}')), null, __('Are you sure?')) ?>" ?></li>
<? endif; ?>
	  <li><?= "<?= \$this->Html->link(__('List {$pluralHumanName}'), array('action'=>'index')) ?>" ?></li>
<? $done = array(); ?>
<? foreach($associations as $type => $data): ?>
<? foreach($data as $alias => $details): ?>
<? if($details['controller'] != $this->name && !in_array($details['controller'], $done)): ?>
<? $cont = $details['controller']; ?>
<? $hcont = Inflector::humanize($cont); ?>
<? $halias = Inflector::humanize(Inflector::underscore($alias)); ?>
	  <li class="nav-header"><?= "<?= __('{$hcont}'); ?>" ?></li>
	  <li><?= "<?= \$this->Html->link(__('List {$hcont}'), array('controller'=>'{$cont}', 'action'=>'index')) ?>" ?></li>
	  <li><?= "<?= \$this->Html->link(__('New {$halias}'), array('controller'=>'{$cont}', 'action'=> 'add')) ?>" ?></li>
<? $done[] = $details['controller'] ?>
<? endif; ?>
<? endforeach; ?>
<? endforeach; ?>
	</ul>
  </div>
  <div class="span9">
<?= "    <?= \$this->Form->create('{$modelClass}') ?>\n" ?>
<? foreach($fields as $i => $field): ?>
<? if(strpos($action, 'add') !== false && $field == $primaryKey): ?>
<? continue; ?>
<? elseif(!in_array($field, array('created', 'modified', 'updated'))): ?>
<? if($i == 1): ?>
<?= "    <?= \$this->Form->input('{$field}', array('autofocus'=>'true')) ?>\n" ?>
<? else: ?>
<?= "    <?= \$this->Form->input('{$field}') ?>\n" ?>
<? endif; ?>
<? endif; ?>
<? endforeach; ?>
<? if(!empty($associations['hasAndBelongsToMany'])): ?>
<? foreach($associations['hasAndBelongsToMany'] as $assoc_name => $assoc_data): ?>
<?= "    <?= \$this->Form->input('{$assoc_name}') ?>\n" ?>
<? endforeach; ?>
<? endif; ?>
<?= "    <?= \$this->Form->end(__('Submit')) ?>\n" ?>
  </div>
</div>