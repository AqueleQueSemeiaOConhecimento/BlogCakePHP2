<h1>Blog posts</h1>
<?= $this->Html->link('Add Post', array('controller' => 'posts', 'action' => 'add')); ?>
<table>
  <tr>
    <th>Id</th>
    <th>Title</th>
    <th>Category</th>
    <th>User Name</th>
    <th>Action</th>
    <th>Created</th>
  </tr>

  <?php foreach ($posts as $post): ?>
    <tr>
      <td><?= $post['Post']['id']; ?></td>
      <td>
        <?= $this->Html->link($post['Post']['title'],
        array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
      </td>
      <td>
       <?= $post['Category']['name'] ?>
      </td>
      <td>

        <?= h($post['User']['username']) ?>
      </td>
      <td>
        <?= $this->Form->postLink('Delete', array('controller' => 'posts', 'action' => 'delete', $post['Post']['id']),
        array('confirm' => 'Are you sure?')); ?>

        <?php
          echo $this->Html->link('Edit', array('controller' => 'posts', 'action' => 'edit', $post['Post']['id']));
        ?>
      </td>
      <td><?= $post['Post']['created']; ?></td>
    </tr>
  <?php endforeach ?>
</table>

