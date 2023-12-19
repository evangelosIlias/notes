<?php
 
use function functions\main\base_path;

require base_path('views/partials/_head.php'); 
require base_path('views/partials/_nav.php');
require base_path('views/partials/_banner.php')
?>

<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
      <strong>Single Note Page</strong>
        <p class="text-green-700">
          <?= $note['body'] ?> 
        </p>

        <a href="/note/edit?=<?= $note['id'] ?>">
          <button class="mt-4 bg-purple-500 hover:bg-purple-700 text-white font-bold px-4 py-2 rounded">Edit</button>
        </a>
        <form action="" method="POST">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="id" value="<?= $note["id"] ?>">
          <button class="mt-4 bg-red-500 hover:bg-red-700 text-white font-bold px-4 py-2 rounded">Delete</button>
        </form>
  </div>
</main>

<?php require base_path('views/partials/_footer.php') ?>