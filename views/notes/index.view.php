<?php 

use function functions\main\base_path;

require base_path('views/partials/_head.php'); 
require base_path('views/partials/_nav.php');
require base_path('views/partials/_banner.php')
?>

<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
      <strong>Note Page</strong>
      <ul>
        <?php foreach($notes as $note): ?>
            <li>
              <a href="/note?id=<?= $note['id'] ?>" class="text-orange-500 hover:underline">
                <?= $note['body'] ?>
              </a>
            </li>
        <?php endforeach ?> 
      </ul> 
      <p class="mt-6">
        <a href="/notes/create" class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">Create Note</a>
      </p>
  </div>
</main>

<?php require base_path('views/partials/_footer.php') ?>