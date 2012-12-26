<? if(!$admin): ?>
	public function beforeFilter() {
		parent::beforeFilter();
<? if($currentModelName == 'User'): ?>
		$this->Auth->allow(array('register'));
<? endif; ?>
	}
<? endif; ?>

	public function <?= $admin ?>index() {
		$this-><?= $currentModelName ?>->recursive = 0;
		$this->set('<?= $pluralName ?>', $this->paginate());
	}


	public function <?= $admin ?>view($id = null) {
		$this-><?= $currentModelName; ?>->id = $id;
		if (!$this-><?= $currentModelName; ?>->exists()) {
			throw new NotFoundException(__('Invalid <?= strtolower($singularHumanName) ?>'));
		}
		$this->set('<?= $singularName ?>', $this-><?= $currentModelName; ?>->read(null, $id));
	}

<? $compact = array(); ?>

	public function <?= $admin ?>add() {
		if ($this->request->is('post')) {
			$this-><?= $currentModelName; ?>->create();
			if ($this-><?= $currentModelName; ?>->save($this->request->data)) {
<? if ($wannaUseSession): ?>
				$this->Session->setFlash(__('The <?= strtolower($singularHumanName) ?> has been saved'));
				$this->redirect(array('action' => 'index'));
<? else: ?>
				$this->flash(__('<?= ucfirst(strtolower($currentModelName)) ?> saved.'), array('action' => 'index'));
<? endif; ?>
			} else {
<? if ($wannaUseSession): ?>
				$this->Session->setFlash(__('The <?= strtolower($singularHumanName) ?> could not be saved. Please, try again.'));
<? endif; ?>
			}
		}
<?
	foreach (array('belongsTo', 'hasAndBelongsToMany') as $assoc):
		foreach ($modelObj->{$assoc} as $associationName => $relation):
			if (!empty($associationName)):
				$otherModelName = $this->_modelName($associationName);
				$otherPluralName = $this->_pluralName($associationName);
				echo "\t\t\${$otherPluralName} = \$this->{$currentModelName}->{$otherModelName}->find('list');\n";
				$compact[] = "'{$otherPluralName}'";
			endif;
		endforeach;
	endforeach;
	if (!empty($compact)):
		echo "\t\t\$this->set(compact(".join(', ', $compact)."));\n";
	endif;
?>
	}

<? $compact = array(); ?>
	public function <?= $admin ?>edit($id = null) {
		$this-><?= $currentModelName ?>->id = $id;
		if (!$this-><?= $currentModelName ?>->exists()) {
			throw new NotFoundException(__('Invalid <?= strtolower($singularHumanName) ?>'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this-><?= $currentModelName ?>->save($this->request->data)) {
<? if ($wannaUseSession): ?>
				$this->Session->setFlash(__('The <?= strtolower($singularHumanName) ?> has been saved'));
				$this->redirect(array('action' => 'index'));
<? else: ?>
				$this->flash(__('The <?= strtolower($singularHumanName) ?> has been saved.'), array('action' => 'index'));
<? endif; ?>
			} else {
<? if ($wannaUseSession): ?>
				$this->Session->setFlash(__('The <?= strtolower($singularHumanName) ?> could not be saved. Please, try again.'));
<? endif; ?>
			}
		} else {
			$this->request->data = $this-><?= $currentModelName ?>->read(null, $id);
		}
<?
		foreach (array('belongsTo', 'hasAndBelongsToMany') as $assoc):
			foreach ($modelObj->{$assoc} as $associationName => $relation):
				if (!empty($associationName)):
					$otherModelName = $this->_modelName($associationName);
					$otherPluralName = $this->_pluralName($associationName);
					echo "\t\t\${$otherPluralName} = \$this->{$currentModelName}->{$otherModelName}->find('list');\n";
					$compact[] = "'{$otherPluralName}'";
				endif;
			endforeach;
		endforeach;
		if (!empty($compact)):
			echo "\t\t\$this->set(compact(".join(', ', $compact)."));\n";
		endif;
	?>
	}

	public function <?= $admin ?>delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this-><?= $currentModelName ?>->id = $id;
		if (!$this-><?= $currentModelName ?>->exists()) {
			throw new NotFoundException(__('Invalid <?= strtolower($singularHumanName) ?>'));
		}
		if ($this-><?= $currentModelName ?>->delete()) {
<? if ($wannaUseSession): ?>
			$this->Session->setFlash(__('<?= ucfirst(strtolower($singularHumanName)) ?> deleted'));
			$this->redirect(array('action' => 'index'));
<? else: ?>
			$this->flash(__('<?= ucfirst(strtolower($singularHumanName)) ?> deleted'), array('action' => 'index'));
<? endif; ?>
		}
<? if ($wannaUseSession): ?>
		$this->Session->setFlash(__('<?= ucfirst(strtolower($singularHumanName)) ?> was not deleted'));
<? else: ?>
		$this->flash(__('<?= ucfirst(strtolower($singularHumanName)) ?> was not deleted'), array('action' => 'index'));
<? endif; ?>
		$this->redirect(array('action' => 'index'));
	}

<? if($currentModelName == 'User' && !$admin): ?>
	public function login() {
		if($this->request->is('post')) {
			if($this->Auth->login()) {
				return $this->redirect($this->Auth->redirect());
			} else {
<? if($wannaUseSession): ?>
				$this->Session->setFlash(__('Incorrect username or password.'), 'error');
<? else: ?>
				$this->flash(__('Incorrect username or password.'), array('action'=>"<?= ${admin} ?>login"));
<? endif; ?>
			}
		}
	}

	public function register() {
		if($this->request->is('post')) {
			if($this->User->save($this->request->data)) {
<? if($wannaUseSession): ?>
				$this->Session->setFlash(__('Thank you for registering.'), 'success');
<? else: ?>
				$this->flash(__('Thank you for registering.'), array('action'=>'login'));
<? endif; ?>
				$this->redirect(array('action'=>'login'));
			} else {
<? if($wannaUseSession): ?>
				$this->Session->setFlash(__('Something went wrong. Please ' .
											'verify your information below and ' .
											'try again.'), 'error');
<? else: ?>
				$this->flash(__('Something went wrong.'), array('action'=>'register'));
<? endif; ?>
			}
		}
	}

	public function logout() {
		$this->redirect($this->Auth->logout());
	}
<? endif; ?>