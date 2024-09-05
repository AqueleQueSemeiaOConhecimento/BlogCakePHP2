<?php

class PostsController extends AppController {
  public $uses = ['Post', 'Category'];

  public $helpers = array('Html', 'Form');

  public $components = array('Flash');

  public function index() {
    $this->set('posts', $this->Post->find('all'));
    $categories = $this->Category->find('all');
    $this->set('categories', $categories);
  }

  public function view($id = null) {
    if (!$id) {
      throw new NotFoundException(__('Invalid post'));
    }

    $post = $this->Post->findById($id);
    if (!$post) {
      throw new NotFoundException(__('Invalid post'));
    }
    $this->set('post', $post);
  }

  public function add() {
    $categories = $this->Post->Category->find('list', [
      'fields' => ['Category.id', 'Category.name']
    ]);

    $userId = $this->Auth->user('id');

    $this->set(['categories', 'userId'], [$categories, $userId]);


    if ($this->request->is('post')) {
      $this->Post->create();
      if ($this->Post->save($this->request->data)) {
        return $this->Flash->success(__('Your post has been saved.'));
      }
      $this->Flash->error(__('Unable to add your post.'));
    }
  }

  public function edit($id = null) {

    $categories = $this->Post->Category->find('list', [
      'fields' => ['Category.id', 'Category.name']
    ]);

    $this->set('categories', $categories);

    if (!$id) {
      throw new NotFoundException(__('Invalid post'));
    }
    $post = $this->Post->findById($id);
    if (!$post) {
      throw new NotFoundException(__('Invalid post'));
    }

    if ($this->request->is(array('post', 'put'))) {
      $this->Post->id = $id;
      if ($this->Post->save($this->request->data)) {
        return $this->Flash->success(__('Your post has been updated'));
      }
      $this->Flash->error(__('Unable to update your post.'));
    }

    if (!$this->request->data) {
      $this->request->data = $post;
    }
  }

  public function delete($id) {
    if ($this->request->is('get')) {
      throw new MethodNotAllowedException();
    }

    if ($this->Post->delete($id)) {
      $this->Flash->success(__('The post with id: %s has been deleted.' . h($id)));
    }

    return $this->redirect(array('action' => 'index'));
  }

  public function category($id = null) {

    if(!$id) {
      $this->Flash->error(__('id nao encontrado'));
    }

    $conteudo = $this->Post->find('all', [
    'conditions' => ['category_id' => $id]
    ]);

    $this->set('conteudos', $conteudo);
  }

}
