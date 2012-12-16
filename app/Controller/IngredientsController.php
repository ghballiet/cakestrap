<?php
App::uses('AppController', 'Controller');
/**
 * Ingredients Controller
 *
 * @property Ingredient $Ingredient
 */
class IngredientsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Ingredient->recursive = 0;
		$this->set('ingredients', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Ingredient->id = $id;
		if (!$this->Ingredient->exists()) {
			throw new NotFoundException(__('Invalid ingredient'));
		}
		$this->set('ingredient', $this->Ingredient->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Ingredient->create();
			if ($this->Ingredient->save($this->request->data)) {
				$this->Session->setFlash(__('The ingredient has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ingredient could not be saved. Please, try again.'));
			}
		}
		$recipes = $this->Ingredient->Recipe->find('list');
		$this->set(compact('recipes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Ingredient->id = $id;
		if (!$this->Ingredient->exists()) {
			throw new NotFoundException(__('Invalid ingredient'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Ingredient->save($this->request->data)) {
				$this->Session->setFlash(__('The ingredient has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ingredient could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Ingredient->read(null, $id);
		}
		$recipes = $this->Ingredient->Recipe->find('list');
		$this->set(compact('recipes'));
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Ingredient->id = $id;
		if (!$this->Ingredient->exists()) {
			throw new NotFoundException(__('Invalid ingredient'));
		}
		if ($this->Ingredient->delete()) {
			$this->Session->setFlash(__('Ingredient deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Ingredient was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Ingredient->recursive = 0;
		$this->set('ingredients', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Ingredient->id = $id;
		if (!$this->Ingredient->exists()) {
			throw new NotFoundException(__('Invalid ingredient'));
		}
		$this->set('ingredient', $this->Ingredient->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Ingredient->create();
			if ($this->Ingredient->save($this->request->data)) {
				$this->Session->setFlash(__('The ingredient has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ingredient could not be saved. Please, try again.'));
			}
		}
		$recipes = $this->Ingredient->Recipe->find('list');
		$this->set(compact('recipes'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Ingredient->id = $id;
		if (!$this->Ingredient->exists()) {
			throw new NotFoundException(__('Invalid ingredient'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Ingredient->save($this->request->data)) {
				$this->Session->setFlash(__('The ingredient has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ingredient could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Ingredient->read(null, $id);
		}
		$recipes = $this->Ingredient->Recipe->find('list');
		$this->set(compact('recipes'));
	}

/**
 * admin_delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Ingredient->id = $id;
		if (!$this->Ingredient->exists()) {
			throw new NotFoundException(__('Invalid ingredient'));
		}
		if ($this->Ingredient->delete()) {
			$this->Session->setFlash(__('Ingredient deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Ingredient was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
