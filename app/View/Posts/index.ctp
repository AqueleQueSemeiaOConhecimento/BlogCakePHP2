<h1>Blog posts</h1>
<?= $this->Html->link('Add Post', array('controller' => 'posts', 'action' => 'add')); ?>

<table>
  <tr>
  <th>Categories</th>
  </tr>
<?php foreach($categories as $category): ?>
  <tr>
    <td><?= $this->Html->link($category['Category']['name'], [
      'controller' => 'posts', 'action' => 'category', $category['Category']['id']
    ]); ?></td>
  </tr>
<?php endforeach ?>
</table>


<table>
  <tr>
    <th>Id</th>
    <th>Title</th>
    <th>Category</th>
    <th>User Name</th>
    <th>Action</th>
    <th>Created</th>
  </tr>

<?php foreach($posts as $post): ?>
  <div class="flex sm:justify-center lg:justify-center sm:mx-auto lg:mx-0 p-2 sm:mb-6 sm:mt-12 lg:mb-4 text-white bg-sky-500/75 hover:bg-sky-500/50 border-2 border-inherit border-solid rounded-md sm:w-48 lg:w-24 cursor-pointer uppercase sm:text-3xl lg:text-sm"><?= $this->Html->link($post['Category']['name'], [
    'controller' => 'posts', 'action' => 'category', $post['Category']['id']
  ]); ?></div>
  <h3 class="flex sm:justify-center lg:justify-normal sm:text-5xl lg:text-3xl text-gray-950 font-bold lg:mb-2 sm:mb-6 " ><?= $post['Post']['title']; ?></h3>
  <div>
    <p class="flex sm:justify-center lg:justify-normal sm:text-center sm:text-3xl sm:mb-6 sm:items-center italic lg:text-lg lg:mb-2">
      <?= $post['Post']['body']; ?>
    </p>
  </div>
  <span class="flex sm:justify-center lg:justify-normal sm:text-2xl lg:text-xs italic"> -
    <?= $post['Post']['created'] ?>
  </span>
<?php endforeach; ?>





