<?php


class CategoriesController extends AppController {

  public function index() {
    $this->set('categories', $this->Category->find('all'));
  }

  public function add() {
    if($this->request->is('post')) {
      $this->Category->create();
      if($this->Category->save($this->request->data)) {
        return $this->Flash->success(__('Category created with success'));
      }
      return $this->Flash->error(__('Category not saved'));
    }
  }

  public function edit($id = null) {
    if (!$id) {
      throw new NotFoundException(__('Invalid post'));
    }
    $category = $this->Category->findById($id);
    if (!$category) {
      throw new NotFoundException(__('Invalid post'));
    }

    if ($this->request->is(array('post', 'put'))) {
      $this->Category->id = $id;
      if ($this->Category->save($this->request->data)) {
        return $this->Flash->success(__('Your category has been updated'));
      }
      $this->Flash->error(__('Unable to update your category.'));
    }

    if (!$this->request->data) {
      $this->request->data = $category;
    }
  }

  public function delete($id = null) {
    if($this->request->is('get')) {
      throw new MethodNotAllowedException();
    }

    if($this->Category->delete($id)) {
      $this->Flash->success(__('Category deleted with success'));
    }
    $this->redirect(array('controller' => 'categories', 'action' => 'index'));
  }

}
