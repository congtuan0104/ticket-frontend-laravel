<x-app-layout>
<div class="container mx-auto mt-10">
    <h1 class="text-4xl font-bold mb-6 text-center text-gray-800">Dashboard</h1>
    <div class="flex justify-center">
        <div class="grid grid-cols-2 gap-8 p-8 border border-gray-300 rounded-lg shadow-lg bg-white">
            <a href="{{ route('eventCategories') }}" class="flex items-center justify-center h-40 w-48 bg-blue-600 hover:bg-blue-800 text-white font-bold rounded-lg shadow transition duration-300 transform hover:scale-105">
                <h2 class="text-xl">Event Categories</h2>
            </a>
            <a href="{{ route('organizations') }}" class="flex items-center justify-center h-40 w-48 bg-green-600 hover:bg-green-800 text-white font-bold rounded-lg shadow transition duration-300 transform hover:scale-105">
                <h2 class="text-xl">Organizations</h2>
            </a>
            <a href="{{ route('users') }}" class="flex items-center justify-center h-40 w-48 bg-yellow-600 hover:bg-yellow-800 text-white font-bold rounded-lg shadow transition duration-300 transform hover:scale-105">
                <h2 class="text-xl">Users</h2>
            </a>
            <a href="{{ route('cities') }}" class="flex items-center justify-center h-40 w-48 bg-red-600 hover:bg-red-800 text-white font-bold rounded-lg shadow transition duration-300 transform hover:scale-105">
                <h2 class="text-xl">Cities</h2>
            </a>
        </div>
    </div>
</div>
</x-app-layout>
