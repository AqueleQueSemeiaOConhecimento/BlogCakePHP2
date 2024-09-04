<h1>Posts where category is <?= $conteudos[0]['Category']['name']; ?> </h1>


<table>
  <tr>
    <th>Id</th>
    <th>Title</th>
    <th>Category</th>
    <th>User Name</th>
    <th>Action</th>
    <th>Created</th>
  </tr>

  <?php foreach($conteudos as $conteudo): ?>
    <tr>
  <td>
    <?= $conteudo['Post']['id']; ?>
  </td>
  <td>
    <?= $conteudo['Post']['title']; ?>
  </td>
  <td>
    <?= $conteudo['Category']['name']; ?>
  </td>
  <td>
    <?= $conteudo['User']['username']; ?>
  </td>
  <td>
    <?= $this->Form->postLink('Delete', [
      'controller' => 'posts', 'action' => 'delete', $conteudo['Post']['id']
    ], ['confirm' => 'Are you sure?']); ?>

    <?= $this->Html->link('Edit', [
      'controller' => 'posts', 'action' => 'edit', $conteudo['Post']['id']
    ]); ?>
  </td>
  <td>
    <?= $conteudo['Post']['created']; ?>
  </td>
  </tr>
  <?php endforeach ?>

</table>
