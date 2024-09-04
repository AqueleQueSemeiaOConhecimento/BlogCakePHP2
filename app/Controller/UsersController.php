<?php

App::uses('AppController', 'Controller');


class UsersController extends AppController {
  public $components = ['Email', 'Flash'];


  public function beforeFilter()
  {
    parent::beforeFilter();
    $this->Auth->allow('add', 'logout');
  }

  public function login() {
    if ($this->request->is('post')) {
      if ($this->Auth->login()) {
        return $this->redirect($this->Auth->redirectUrl());
      }
      $this->Flash->error(__('Invalid username or password, try again'));
    }
  }

  public function logout() {
    return $this->redirect($this->Auth->logout());
  }

  public function index() {
    $this->User->recursive = 0;
    $this->set('Users', $this->paginate());
  }

  public function view($id = null) {
    $this->User->id = $id;
    if (!$this->User->exists()) {
      throw new NotFoundException(__('Invalid user'));
    }
    $this->set('user', $this->User->findById($id));
  }

  public function add() {
    if ($this->request->is('post')) {
        $this->User->create();
        $codigoVerificacao = uniqid();
        $this->request->data['User']['code'] = $codigoVerificacao;
        if ($this->User->save($this->request->data)) {
            $emailData = $this->request->data['User'];
            $this->Email->sendEmail($emailData['email'], 'Bem-vindo Obrigado por se cadastrar!', $codigoVerificacao);
            return $this->redirect(['controller' => 'posts', 'action' => 'index']);
        }
        $this->Flash->error(__('The user could not be saved. Please, try again.'));
    }
  }

  public function status() {
    if ($this->request->is('post')) {
      $user = $this->Auth->user();

      $codigoRecebido = $this->request->data['User']['code'];
      if($user['code'] === $codigoRecebido) {
        $this->User->id = $user['id'];
        if($this->User->saveField('status', 1)) {
          $this->Flash->success(__('User verify with success'));
          return $this->redirect(['controller' => 'posts', 'action' => 'index']);
        }
      }
      var_dump($this->request->data);
      return $this->Flash->error(__(('Code invalid, your code = ' . $codigoRecebido . " codigo certo = " . $user['code'])));
    }
  }

  public function edit($id = null) {
      $this->User->id = $id;
      if (!$this->User->exists()) {
          throw new NotFoundException(__('Invalid user'));
      }
      if ($this->request->is('post') || $this->request->is('put')) {
          if ($this->User->save($this->request->data)) {
              $this->Flash->success(__('The user has been saved'));
              return $this->redirect(array('action' => 'index'));
          }
          $this->Flash->error(
              __('The user could not be saved. Please, try again.')
          );
      } else {
          $this->request->data = $this->User->findById($id);
          unset($this->request->data['User']['password']);
      }
  }

  public function delete($id = null) {
      $this->request->allowMethod('post');

      $this->User->id = $id;
      if (!$this->User->exists()) {
          throw new NotFoundException(__('Invalid user'));
      }
      if ($this->User->delete()) {
          $this->Flash->success(__('User deleted'));
          return $this->redirect(array('action' => 'index'));
      }
      $this->Flash->error(__('User was not deleted'));
      return $this->redirect(array('action' => 'index'));
  }


}
