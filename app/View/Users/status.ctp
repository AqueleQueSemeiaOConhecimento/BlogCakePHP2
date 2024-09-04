<h1>Verify account</h1>

<?php
echo $this->Form->create('User');
echo $this->Form->input('code');
echo $this->Form->end(__('Confirm'));
