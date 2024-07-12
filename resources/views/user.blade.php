<x-app-layout>
<div class="container mx-auto mt-5">
        <h1 class="text-3xl font-bold mb-5">User Management</h1>

        <div class="container mx-auto mt-5">
    <h1 class="text-3xl font-bold mb-6">User List</h1>

    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <h2 class="text-2xl mb-4">Users</h2>
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
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.edit-button').forEach(function(button) {
                button.addEventListener('click', function() {
                    const row = button.closest('tr');
                    const cityNameSpan = row.querySelector('.city-name');
                    const cityNameInput = row.querySelector('input[type="text"]');
                    const saveForm = row.querySelector('form.hidden');

                    cityNameSpan.classList.add('hidden');
                    cityNameInput.classList.remove('hidden');
                    button.classList.add('hidden');
                    saveForm.classList.remove('hidden');

                    cityNameInput.addEventListener('input', function() {
                        saveForm.querySelector('input[name="cityName"]').value = cityNameInput.value;
                    });
                });
            });
        });
    </script>
</x-app-layout>