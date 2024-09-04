<div class="user form">
  <?= $this->Form->create('User'); ?>
  <fieldset>
    <legend><?= __('Add User'); ?></legend>
    <?php echo $this->Form->input('username');
    echo $this->Form->input('password');
    echo $this->Form->input('email');
    echo $this->Form->input('role', array(
      'options' => array('admin' => 'Admin', 'author' => 'Author')
    ));
    ?>
  </fieldset>
  <?= $this->Form->end(__('Submit')); ?>
</div>
