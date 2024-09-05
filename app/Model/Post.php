<?php

class Post extends AppModel {
  public $validate = array(
    'title' => array(
      'rule' => 'notBlank'
    ),
    'body' => array(
      'rule' => 'notBlank'
    ),
    'image' => [
      'rule' => ['file', ['types' => ['image/jpeg', 'image/png', 'image/gif']]],
      'message' => 'Please, envite a image valite',
      'allowEmpty' => true,
      'required' => false,
      'on' => 'create'
    ],
    );

  public $belongsTo = array(
    'Category' => array(
      'className' => 'Category',
      'foreignKey' => 'category_id'
    ),

    'User' => [
      'className' => 'User',
      'foreignKey' => 'user_id'
    ]

    );


}
