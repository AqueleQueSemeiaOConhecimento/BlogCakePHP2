<?php

class Category extends AppModel {
  public $validate = array(
    'name' => array(
        'rule' => 'notBlank',
        'message' => 'Name is required'
    ),
    'unique' => array(
      'rule' => 'isUnique',
      'message' => 'This category exists'
    )
      );
}
