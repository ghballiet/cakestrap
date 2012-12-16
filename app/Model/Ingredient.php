<?php
App::uses('AppModel', 'Model');
/**
 * Ingredient Model
 *
 * @property Recipe $Recipe
 */
class Ingredient extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Recipe' => array(
			'className' => 'Recipe',
			'joinTable' => 'ingredients_recipes',
			'foreignKey' => 'ingredient_id',
			'associationForeignKey' => 'recipe_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
