<h1>Edit Post</h1>
<?php
echo $this->Form->create('Post', ['type' => 'file']);
echo $this->Form->input('title');
echo $this->Form->input('image', ['type' => 'file']);
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->input('category_id', [
  'type' => 'select',
  'options' => $categories
]);
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Post');
?>
