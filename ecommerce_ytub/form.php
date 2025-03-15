 <!-- Modal for adding new user -->
 <div x-show="openModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center z-50" x-transition>
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-lg w-full" @click.away="openModal = false">
            <h2 class="text-2xl font-semibold mb-4">Add New User</h2>
            <form id="addform" method="post" encrypt="multipart/form-data">
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2" for="fname">Name</label>
                    <input type="text" id="fname" name="fname" class="w-full p-2 border rounded-md" placeholder="Enter name" required />
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2" for="email" >Email</label>
                    <input type="email" id="email" name="email" class="w-full p-2 border rounded-md" placeholder="Enter email" required />
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2" for="phone">Phone</label>
                    <input type="text" id="phone" name="phone" class="w-full p-2 border rounded-md" placeholder="Enter phone" required />
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2" for="image">Profile Image</label>
                    <input type="file" name="img" id="image" class="w-full p-2 border rounded-md" accept="image/*" required />
                </div>
                <div class="flex justify-end">
                    <button type="button" @click="openModal = false" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-400 mr-2">Cancel</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-400">Save</button>

                    <!-- 2 input fields for adding, updating, deleting, viewing  -->
                     <input type="hidden" name="action" value="adduser">
                     <input type="hidden" name="userId" id="userId" value="">
                </div>
            </form>
        </div>
    </div>