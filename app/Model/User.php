<?php

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
  public $validate = array(
    'username' => array(
      'required' => array (
        'rule' => 'notBlank',
        'message' => 'A username is required'
      )
      ),
      'password' => array(
        'required' => array(
          'rule' => 'notBlank',
          'message' => 'A password is required'
        )
        ),
        'email' => array(
          'required' => array(
            'rule' => 'notBlank',
            'message' => 'A email is required'
          )
          ),
        'role' => array(
          'required' => array(
            'rule' => array ('inList', array('admin', 'author')),
            'message' => 'Please enter a valid role',
            'allowEmpty' => false
          )
        )
          );

  public function beforeSave($options = array()) {
    if (isset($this->data[$this->alias]['password'])) {
      $passwordHasher = new BlowfishPasswordHasher();
      $this->data[$this->alias]['password'] = $passwordHasher->hash(
        $this->data[$this->alias]['password']
      );
    }
    return true;
  }

  public $hasMany = [
    'Post' => [
      'className' => 'Post',
      'foreignKey' => 'user_id',
      'dependent' => true
    ]
    ];

}
