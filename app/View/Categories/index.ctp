<h1>Categorias disponiveis:</h1>

<?= $this->Html->link('Add Category', array('controller' => 'categories', 'action' => 'add')); ?>

<table>
  <tr>
    <th>Id</th>
    <th>Categoria</th>
    <th>Actions</th>
  </tr>
  <?php foreach($categories as $categoria): ?>
  <tr>
    <td>
      <?= $categoria['Category']['id'] ?>
    </td>
    <td>
      <?= $categoria['Category']['name'] ?>
    </td>
    <td>
        <?php
          echo $this->Html->link('Edit', array('controller' => 'categories', 'action' => 'edit', $categoria['Category']['id']));
        ?>

      <?= $this->Form->postLink('Delete', array('controller' => 'categories', 'action' => 'delete', $categoria['Category']['id']),
    array('confirm' => 'Are you sure?')); ?>
    </td>
  </tr>
  <?php endforeach ?>
</table>


