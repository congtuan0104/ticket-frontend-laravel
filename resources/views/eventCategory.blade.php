<x-app-layout>
<div class="container mx-auto mt-5">
    <div class=" pr-4">
        <!-- Add Event Category Form -->
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <h2 class="text-2xl mb-4">Add New Event Category</h2>
                <form action="{{ route('add.eventCategory') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="eventCategoryName" class="block text-gray-700 text-sm font-bold mb-2">Event Category Name</label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="eventCategoryName" name="eventCategoryName" required>
                    </div>
                    <div class="mb-4">
                        <label for="eventCategoryDescription" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="eventCategoryDescription" name="eventCategoryDescription" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Add Event Category</button>
                </form>
            </div>
        </div>
    </div>

    <div class=" pl-4">
        <!-- Event Category List -->
        <h2 class="text-2xl mb-4">Event Category List</h2>
        <div class="bg-white shadow-md rounded px-4 py-6">
            <table class="min-w-full">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm">
                        <th class="py-3 px-4 text-left w-1/6">ID</th>
                        <th class="py-3 px-4 text-left w-2/6">Event Category Name</th>
                        <th class="py-3 px-4 text-left w-2/6">Description</th>
                        <th class="py-3 px-4 text-left w-1/6">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($eventCategories as $eventCategory)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="px-4 py-2">{{ $eventCategory['eventCategoryId'] }}</td>
                        <td class="py-2 px-4">
                            <span class="event-category-name">{{ $eventCategory['eventCategoryName'] }}</span>
                            <input type="text" class="hidden shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="eventCategoryName" value="{{ $eventCategory['eventCategoryName'] }}">
                        </td>
                        <td class="py-2 px-4">
                            <span class="event-category-description">{{ $eventCategory['eventCategoryDescription'] }}</span>
                            <textarea class="hidden shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="eventCategoryDescription" rows="2">{{ $eventCategory['eventCategoryDescription'] }}</textarea>
                        </td>
                        <td class="py-2 px-4 flex items-center space-x-2">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline edit-button">Edit</button>
                            <form action="{{ route('update.eventCategory', $eventCategory['eventCategoryId']) }}" method="POST" class="hidden">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="eventCategoryId" value="{{ $eventCategory['eventCategoryId'] }}">
                                <input type="hidden" name="eventCategoryName" value="{{ $eventCategory['eventCategoryName'] }}">
                                <input type="hidden" name="eventCategoryDescription" value="{{ $eventCategory['eventCategoryDescription'] }}">
                                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline save-button">Save</button>
                            </form>
                            <!-- Delete Button -->
                            <form action="{{ route('delete.eventCategory') }}" method="POST" class="delete-form" onsubmit="return confirm('Are you sure you want to delete this event category?');">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="eventCategoryId" value="{{ $eventCategory['eventCategoryId'] }}">
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
                const eventCategoryNameSpan = row.querySelector('.event-category-name');
                const eventCategoryNameInput = row.querySelector('input[name="eventCategoryName"]');
                const eventCategoryDescriptionSpan = row.querySelector('.event-category-description');
                const eventCategoryDescriptionInput = row.querySelector('textarea[name="eventCategoryDescription"]');
                const saveForm = row.querySelector('form.hidden');

                eventCategoryNameSpan.classList.add('hidden');
                eventCategoryNameInput.classList.remove('hidden');
                eventCategoryDescriptionSpan.classList.add('hidden');
                eventCategoryDescriptionInput.classList.remove('hidden');
                button.classList.add('hidden');
                saveForm.classList.remove('hidden');

                eventCategoryNameInput.addEventListener('input', function() {
                    saveForm.querySelector('input[name="eventCategoryName"]').value = eventCategoryNameInput.value;
                });

                eventCategoryDescriptionInput.addEventListener('input', function() {
                    saveForm.querySelector('input[name="eventCategoryDescription"]').value = eventCategoryDescriptionInput.value;
                });
            });
        });
    });
</script>

</x-app-layout>