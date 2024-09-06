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
      'rule' => ['extension', ['jpeg', 'git', 'png', 'jpg']],
      'message' => 'Pleae supply a valid image'
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
