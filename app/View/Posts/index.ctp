<h1>Blog posts</h1>
<?= $this->Html->link('Add Post', array('controller' => 'posts', 'action' => 'add')); ?>

<h3>Categories</h1>

<div>
  <ul class="flex flex-row justify-between overflow-auto">
    <?php foreach($categories as $category): ?>
      <li class="min-w-64 text-center lg:text-3xl sm:text-3xl border-2 border-solid border-black rounded-md lg:p-2 lg:mt-4 sm:p-2 bg-green-300 hover:bg-green-200">
        <?= $this->Html->link($category['Category']['name'], [
          'controller' => 'posts', 'action' => 'category', $category['Category']['id']
        ]); ?>
      </li>
    <?php endforeach ?>
  </ul>
</div>

<?php foreach($posts as $post): ?>
  <div class="flex sm:justify-center lg:justify-center sm:mx-auto lg:mx-0 p-2 sm:mb-6 sm:mt-12 lg:mb-4 text-white bg-sky-500/75 hover:bg-sky-500/50 border-2 border-inherit border-solid rounded-md sm:w-48 lg:w-24 cursor-pointer uppercase sm:text-3xl lg:text-sm"><?= $this->Html->link($post['Category']['name'], [
    'controller' => 'posts', 'action' => 'category', $post['Category']['id']
  ]); ?></div>
  <h3 class="flex sm:justify-center lg:justify-normal sm:text-5xl lg:text-3xl text-gray-950 font-bold lg:mb-2 sm:mb-6 " ><?= $post['Post']['title']; ?></h3>
  <?php if(!empty($post['Post']['image'])): ?>
  <div class="max-w-80 sm:mx-auto sm:max-w-xl lg:mx-0 flex sm:justify-center lg:justify-normal sm:mx-auto lg:mx-0">
    <?= $this->Html->image('posts/' . $post['Post']['image'], ['imagem']); ?>
  </div>
  <?php endif ?>
  <div>
    <p class="flex sm:justify-center lg:justify-normal sm:text-center sm:text-3xl sm:mb-6 sm:items-center italic lg:text-lg lg:mb-2">
      <?= $post['Post']['body']; ?>
    </p>
  </div>
  <?php if($logado): ?>
  <div class="flex sm:justify-center lg:justify-normal sm:text-2xl lg:text-sm">
    <?= $this->Html->link('Edit', [
      'controller' => 'posts', 'action' => 'edit', $post['Post']['id']
    ]); ?>
    |
    <?= $this->Form->postLink('Delete', [
      'controller' => 'posts', 'action' => 'delete', $post['Post']['id']
    ], ['confirm' => 'Are you sure ?']) ?>
  </div>
  <?php endif ?>
  <span class="flex sm:justify-center lg:justify-normal sm:text-2xl lg:text-xs italic">
    <?= $post['User']['username'] ?>
    -
    <?= $post['Post']['created'] ?>
  </span>
<?php endforeach; ?>
