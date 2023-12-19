<?php 

use function functions\main\base_path;

require base_path('views/partials/_head.php'); 
require base_path('views/partials/_nav.php');
require base_path('views/partials/_banner.php')

?>

<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
      <strong>Create a Note</strong>
    
<form method="POST" action="/notes">
  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="col-span-full">
          <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Body</label>
          <div class="mt-2">
            <textarea 
                id="body" 
                name="body" 
                rows="8" 
                class="block w-3/4 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                ><?= $_POST['body'] ?? '' ?></textarea>
            <?php if(isset($errors['body'])) :?>
                <p class="text-red-500 text-xs mt-2"><?= $errors['body'] ?></p>
            <?php endif; ?>
          </div>
        </div>

  <div class="mt-6 flex items-center justify-first gap-x-6">
    <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create</button>
  </div>
  </div>
  </div>
</form>
</main>

<?php require base_path('views/partials/_footer.php') ?>