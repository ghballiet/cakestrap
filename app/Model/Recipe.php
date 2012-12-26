<?
App::uses('AppModel', 'Model');

class Recipe extends AppModel {


	// the associations below have been created with all possible
	// keys, those that are not needed can be removed

	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
