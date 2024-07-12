<x-app-layout>
<div class="container mx-auto mt-5 ">
    <div class="pl-4 pr-4">
        <h1 class="text-3xl font-bold mb-5">Organization Management</h1>

        <!-- Add Organization Form -->
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <h2 class="text-2xl mb-4">Add New Organization</h2>
                <form action="{{ route('add.organization') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="userID" class="block text-gray-700 text-sm font-bold mb-2">UserID</label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="userID" name="userID" required>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="description" name="description" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Add Organization</button>
                </form>
            </div>
        </div>
    </div>

    
    <div class="pl-4 pr-4">
            <h1 class="text-3xl font-bold mb-6">User List</h1>

            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                
                <table class="min-w-full">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm">
                            <th class="py-3 px-4 text-left">User ID</th>
                            <th class="py-3 px-4 text-left">Name</th>
                            <th class="py-3 px-4 text-left">Email</th>
                            <th class="py-3 px-4 text-left">Phone Number</th>
                            <th class="py-3 px-4 text-left">Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="py-3 px-4">{{ $user['id'] }}</td>
                            <td class="py-3 px-4">{{ $user['name'] }}</td>
                            <td class="py-3 px-4">{{ $user['email'] }}</td>
                            <td class="py-3 px-4">{{ $user['phoneNumber'] }}</td>
                            <td class="py-3 px-4">{{ $user['role'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Organization List -->
        <div class="pr-4 pl-4">
        <h2 class="text-2xl mb-4">Organization List</h2>
        <div class="bg-white shadow-md rounded px-4 py-6">
            <table class="min-w-full">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm">
                        <th class="py-3 px-4 w-1/6 text-left">ID</th>
                        <th class="py-3 px-4 w-2/6 text-left">User ID</th>
                        <th class="py-3 px-4 w-2/6 text-left">Description</th>
                        <th class="py-3 px-4 w-2/6 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($organizations as $organization)
                    <tr class="border-b hover:bg-gray-100">
                        <tr class="border-b hover:bg-gray-100">
                        <td class="px-4 py-2">{{ $organization['id'] }}</td>
                        <td class="py-2 px-4">
                            <span class="user-id">{{ $organization['userID'] }}</span>
                            <input type="text" class="hidden shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="userID" value="{{ $organization['userID'] }}">
                        </td>
                        <td class="py-2 px-4">
                            <span class="description">{{ $organization['description'] }}</span>
                            <textarea class="hidden shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="description" rows="2">{{ $organization['description'] }}</textarea>
                        </td>
                        <td class="py-2 px-4 flex items-center space-x-2">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline edit-button">Edit</button>
                            <form action="{{ route('update.organization', $organization['id']) }}" method="POST" class="hidden">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{ $organization['id'] }}">
                                <input type="hidden" name="userID" value="{{ $organization['userID'] }}">
                                <input type="hidden" name="description" value="{{ $organization['description'] }}">
                                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline save-button">Save</button>
                            </form>
                            <!-- Delete Button -->
                            <form action="{{ route('delete.organization') }}" method="POST" class="inline-block delete-form" onsubmit="return confirm('Are you sure you want to delete this organization?');">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $organization['id'] }}">
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button>
                                </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.edit-button').forEach(function(button) {
            button.addEventListener('click', function() {
                const row = button.closest('tr');
                const userIDSpan = row.querySelector('.user-id');
                const userIDInput = row.querySelector('input[name="userID"]');
                const descriptionSpan = row.querySelector('.description');
                const descriptionInput = row.querySelector('textarea[name="description"]');
                const saveForm = row.querySelector('form.hidden');

                userIDSpan.classList.add('hidden');
                userIDInput.classList.remove('hidden');
                descriptionSpan.classList.add('hidden');
                descriptionInput.classList.remove('hidden');
                button.classList.add('hidden');
                saveForm.classList.remove('hidden');

                userIDInput.addEventListener('input', function() {
                    saveForm.querySelector('input[name="userID"]').value = userIDInput.value;
                });

                descriptionInput.addEventListener('input', function() {
                    saveForm.querySelector('input[name="description"]').value = descriptionInput.value;
                });
            });
        });
    });
</script>
</x-app-layout>