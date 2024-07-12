<x-app-layout>
<div class="container mx-auto mt-5">
        <h1 class="text-3xl font-bold mb-5">City Management</h1>

        <!-- Add City Form -->
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <h2 class="text-2xl mb-4">Add New City</h2>
                <form action="{{ route('add.city') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="cityName" class="block text-gray-700 text-sm font-bold mb-2">City Name</label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="cityName" name="cityName" required>
                    </div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Add City</button>
                </form>
            </div>
        </div>

        <!-- City List -->
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8">
            <h2 class="text-2xl mb-4">City List</h2>
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2">ID</th>
                        <th class="py-2">Name</th>
                        <th class="py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cities as $city)
                        <tr class="bg-gray-100">
                            <td class="border px-4 py-2">{{ $city['cityId'] }}</td>
                            <td class="border px-4 py-2">
                                <span class="city-name">{{ $city['cityName'] }}</span>
                                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline hidden" value="{{ $city['cityName'] }}">
                            </td>
                            <td class="border px-4 py-2">
                                <!-- Edit Button -->
                                <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline edit-button">Edit</button>
                                <!-- Save Button -->
                                <form action="{{ route('update.city', $city['cityId']) }}" method="POST" class="inline-block hidden">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="cityId" value="{{ $city['cityId'] }}">
                                    <input type="hidden" name="cityName" value="{{ $city['cityName'] }}">
                                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline save-button">Save</button>
                                </form>
                                <!-- Delete Button -->
                                <form action="{{ route('delete.city') }}" method="POST" class="inline-block delete-form" onsubmit="return confirm('Are you sure you want to delete this city?');">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="cityId" value="{{ $city['cityId'] }}">
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
