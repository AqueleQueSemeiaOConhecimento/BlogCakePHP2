<h1>Posts where category is <?= $conteudo[0]['Category']['name']; ?> </h1>


<table>
  <tr>
    <th>Id</th>
    <th>Title</th>
    <th>Category</th>
    <th>User Name</th>
    <th>Action</th>
    <th>Created</th>
  </tr>
  <td>
    <?= $conteudo[0]['Post']['id']; ?>
  </td>
  <td>
    <?= $conteudo[0]['Post']['title']; ?>
  </td>
  <td>
    <?= $conteudo[0]['Category']['name']; ?>
  </td>
  <td>
    <?= $conteudo[0]['User']['username']; ?>
  </td>
  <td>
    <?= $this->Form->postLink('Delete', [
      'controller' => 'posts', 'action' => 'delete', $conteudo[0]['Post']['id']
    ], ['confirm' => 'Are you sure?']); ?>

    <?= $this->Html->link('Edit', [
      'controller' => 'posts', 'action' => 'edit', $conteudo[0]['Post']['id']
    ]); ?>
  </td>
  <td>
    <?= $conteudo[0]['Post']['created']; ?>
  </td>

</table>
