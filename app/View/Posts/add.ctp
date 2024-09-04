<h1>Add Post</h1>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('title');
echo $this->Form->input('category_id', [
  'type' => 'select',
  'label' => 'Category',
  'options' => $categories
]);
echo $this->Form->input('user_id', [
  'type' => 'hidden',
  'value' => $userId
]);
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->end('Save Post');
?>

<?= var_dump($categories); ?>
<?= var_dump($userId); ?>
