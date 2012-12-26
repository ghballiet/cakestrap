<?
App::uses('AppModel', 'Model');

class User extends AppModel {


	// the associations below have been created with all possible
	// keys, those that are not needed can be removed

	public $hasMany = array(
		'Recipe' => array(
			'className' => 'Recipe',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);


	public function beforeSave($options = array()) {
		$this->data['User']['password'] =
			AuthComponent::password($this->data['User']['password']);
		return true;
	}
}
