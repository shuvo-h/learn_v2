<!-- check if database is connected or not -->
<?php
    // phpinfo();
    require_once 'partials/Database.php';
    $dbobj = new Database();
    // var_dump($dbobj)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECOMARKET - User Management</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js for modal handling -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.0/dist/cdn.min.js" defer></script>
</head>
<body x-data="{ openModal: false }">  <!-- Ensure Alpine.js is initialized on the body -->

    <nav class="bg-blue-500 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#" class="text-white font-bold text-xl">Logo</a>
            <ul class="flex space-x-6">
                <li><a href="#" class="text-white hover:text-gray-200">Home</a></li>
                <li><a href="#" class="text-white hover:text-gray-200">About</a></li>
                <li><a href="#" class="text-white hover:text-gray-200">Services</a></li>
                <li><a href="#" class="text-white hover:text-gray-200">Contact</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main content -->
    <section class="p-6">
        <div class="flex justify-between items-center mb-4">
            <input type="text" placeholder="Search users..." class="p-2 border rounded-md w-1/3" />
            <button @click="openModal = true" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-400">Add New</button>
        </div>

        <!-- User Management Table -->
         <?php require_once "tableData.php" ?>
        
        <!-- pagination  -->
        <nav aria-label="Page navigation" class="mt-4">
          <ul class="inline-flex items-center -space-x-px">
              <li>
                  <a href="#" class="px-3 py-2 ml-0 leading-tight text-gray-500 bg-gray-200 border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700">Previous</a>
              </li>
              <li>
                  <a href="#" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">1</a>
              </li>
              <li>
                  <a href="#" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">2</a>
              </li>
              <li>
                  <a href="#" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">3</a>
              </li>
              <li>
                  <a href="#" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">Next</a>
              </li>
          </ul>
      </nav>

    </section>

   <!-- modal here  -->
    <?php  include 'form.php' ?>

    <!-- inclde all the scripts  -->
     <script src="js/script.js"></script>

</body>
</html>
