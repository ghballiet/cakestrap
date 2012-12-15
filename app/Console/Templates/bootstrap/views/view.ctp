<? $shn = $singularHumanName; ?>
<? $phn = $pluralHumanName; ?>

<div class="page-header">
  <h2><?= "<?= __('{$shn}'); ?>" ?></h2>
</div>

<div class="row">
  <div class="span3">
    <ul class="well nav nav-list">
      <li class="nav-header"><?= "<?= __('{$shn}') ?>" ?> Actions</li>
      <li><?= "<?= \$this->Html->link(__('Edit {$shn}'), array('action'=>'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}'])) ?>" ?></li>
      <li><?= "<?= \$this->Form->postLink(__('Delete {$shn}'), array('action'=>'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), null, __('Are you sure?')) ?>" ?></li>
      <li><?= "<?= \$this->Html->link(__('List {$phn}'), array('action'=>'index')) ?>" ?></li>
      <li><?= "<?= \$this->Html->link(__('New {$shn}'), array('action'=>'add')) ?>" ?></li>
<? $done = array(); ?>
<? foreach($associations as $type => $data): ?>
<? foreach($data as $alias => $details): ?>
<? if($details['controller'] != $this->name && !in_array($details['controller'], $done)): ?>
<? $cont = $details['controller']; ?>
<? $hcont = Inflector::humanize($cont); ?>
<? $halias = Inflector::humanize(Inflector::underscore($alias)); ?>
      <li class="nav-header"><?= "<?= __('{$cont}') ?>" ?></li>
      <li><?= "<?= \$this->Html->link(__('List {$hcont}'), array('controller'=>'{$cont}', 'action'=>'index')) ?>" ?></li>
      <li><?= "<?= \$this->Html->link(__('New {$halias}'), array('controller'=>'{$cont}', 'action'=>'add')) ?>" ?></li>
<? $done[] = $cont; ?>
<? endif; ?>
<? endforeach; ?>
<? endforeach; ?>
    </ul>
  </div>
  <div class="span9">
    <table class="table table-condensed">
<? foreach($fields as $field): ?>
      <tr>      
<? $is_key = false; ?>
<? if(!empty($associations['belongsTo'])): ?>
<? foreach($associations['belongsTo'] as $alias=>$details): ?>
<? if($field === $details['foreignKey']): ?>
<? $is_key = true; ?>
<? $halias = Inflector::humanize(Inflector::underscore($alias)); ?>
<? $cont = $details['controller']; ?>
<? $display = $details['displayField']; ?>
<? $pk = $details['primaryKey']; ?>
        <th><?= "<?= __('{$halias}') ?>" ?></th>
        <td><?= "<?= \$this->Html->link(\${$singularVar}['{$alias}']['{$display}'], array('controller'=>'{$cont}', 'action'=>'view', \${$singularVar}['{$alias}']['{$pk}'])) ?>" ?></td>
<? break; ?>
<? endif; ?>
<? endforeach; ?>
<? endif; ?>
<? if($is_key !== true): ?>
<? $human = Inflector::humanize($field); ?>
        <th><?= "<?= __('{$human}') ?>" ?></th>
        <td><?= "<?= h(\${$singularVar}['{$modelClass}']['{$field}']) ?>" ?></td>
<? endif; ?>
      </tr>      
<? endforeach; ?>
    </table>
  </div>
</div>

<hr>

<ul class="nav nav-tabs">
<? $idx = 0; ?>
<? $first = null; ?>
<? foreach($associations as $type => $data): ?>
<? foreach($data as $alias => $details): ?>
<? $hcont = Inflector::humanize($details['controller']); ?>
<? $talias = Inflector::tableize($details['controller']); ?>
<? if($idx == 0): ?>
<? $first = $details['controller']; ?>
  <li class="active"><a href="#<?= $talias ?>" data-toggle="tab"><?= "<?= __('Related {$hcont}') ?>" ?></a></li>
<? else: ?>
  <li><a href="#<?= $talias ?>" data-toggle="tab"><?= "<?= __('Related {$hcont}') ?>" ?></a></li>  
<? endif; ?>
<? $idx++; ?>
<? endforeach; ?>
<? endforeach; ?>
</ul>

<div class="tab-content">
<? foreach($associations as $type => $data): ?>
<? foreach($data as $alias => $details): ?>
<? $cont = $details['controller']; ?>
<? $hcont = Inflector::humanize($cont); ?>
<? $halias = Inflector::humanize(Inflector::underscore($alias)); ?>
<? $osv = Inflector::variable($alias); ?>
<? $talias = Inflector::tableize($alias); ?>
<? $pk = $details['primaryKey']; ?>
<? if($details['controller'] === $first): ?>
  <div class="tab-pane active" id="<?= $talias ?>">
<? else: ?>
  <div class="tab-pane" id="<?= $talias ?>">
<? endif; ?>
<?= "<? if(!empty(\${$singularVar}['{$alias}'])): ?>\n" ?>
    <table class="table table-condensed">
      <tr>
<? foreach($details['fields'] as $field): ?>
<? $hfield = Inflector::humanize($field); ?>
        <th><?= "<?= __('{$hfield}') ?>" ?></th>
<? endforeach; ?>
        <th class="actions"><?= "<?= __('Actions') ?>" ?></th>
      </tr>
<? if($type == 'hasMany' || $type == 'manyToMany'): ?>
<?= "<? foreach(\${$singularVar}['{$alias}'] as \${$osv}): ?>\n" ?>
	<tr>
<? foreach($details['fields'] as $field): ?>
      <td><?= "<?= h(\${$osv}['{$field}']) ?>" ?></td>
<? endforeach; ?>
      <td class="actions">
        <div class="btn-group">
          <a class="btn btn-mini dropdown-toggle btn-primary" data-toggle="dropdown" href="#">
            Action <span class="caret"></span>
          </a>
          <ul class="dropdown-menu pull-right">
            <li><?= "<?= \$this->Html->link(__('View'), array('controller'=>'{$cont}', 'action'=>'view', \${$osv}['{$pk}'])) ?>" ?></li>
            <li><?= "<?= \$this->Html->link(__('Edit'), array('controller'=>'{$cont}', 'action'=>'edit', \${$osv}['{$pk}'])) ?>" ?></li>
            <li><?= "<?= \$this->Form->postLink(__('Delete'), array('controller'=>'{$cont}', 'action'=>'delete', \${$osv}['{$pk}']), null, __('Are you sure?')) ?>" ?></li>
          </ul>
        </div>
      </td>
	</tr>
<?= "<? endforeach; ?>\n" ?>
<? else: ?>
    <tr>
<? foreach($details['fields'] as $field): ?>
      <td><?= "<?= h(\${$singularVar}['{$alias}']['{$field}']) ?>" ?></td>
<? endforeach; ?>
      <td class="actions">
        <div class="btn-group">
          <a class="btn btn-mini dropdown-toggle btn-primary" data-toggle="dropdown" href="#">
            Action <span class="caret"></span>
          </a>
          <ul class="dropdown-menu pull-right">
            <li><?= "<?= \$this->Html->link(__('View'), array('controller'=>'{$cont}', 'action'=>'view', \${$singularVar}['{$alias}']['{$pk}'])) ?>" ?></li>
            <li><?= "<?= \$this->Html->link(__('Edit'), array('controller'=>'{$cont}', 'action'=>'edit', \${$singularVar}['{$alias}']['{$pk}'])) ?>" ?></li>
            <li><?= "<?= \$this->Form->postLink(__('Delete'), array('controller'=>'{$cont}', 'action'=>'delete', \${$singularVar}['{$alias}']['{$pk}']), null, __('Are you sure?')) ?>" ?></li>
          </ul>
        </div>
      </td>
    </tr>
<? endif; ?>
    </table>
<?= "<? else: ?>\n" ?>
    <div class="alert alert-info">
      There are no <strong><?= "<?= __('${hcont}') ?>" ?></strong> related to this <strong><?= "<?= __('{$shn}') ?>" ?></strong>.
    </div>
<?= "<? endif; ?>\n" ?>
  </div>
<? endforeach; ?>
<? endforeach; ?>  
</div>
