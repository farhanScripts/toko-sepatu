<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                    <!-- Active Users Card -->
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-lg font-semibold text-gray-700">Active Users</h2>
                                <p class="text-3xl font-bold text-indigo-600 mt-2">{{ $activeUser }}</p>
                            </div>
                            <div class="bg-indigo-600 p-3 rounded-full text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5.121 19a9 9 0 1113.758 0M12 10a3 3 0 100-6 3 3 0 000 6z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Categories Card -->
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-lg font-semibold text-gray-700">Total Categories</h2>
                                <p class="text-3xl font-bold text-green-600 mt-2">{{ $category }}</p>
                            </div>
                            <div class="bg-green-600 p-3 rounded-full text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Products Card -->
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-lg font-semibold text-gray-700">Total Products</h2>
                                <p class="text-3xl font-bold text-blue-600 mt-2">340</p>
                            </div>
                            <div class="bg-blue-600 p-3 rounded-full text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20 12H4" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Orders Card -->
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-lg font-semibold text-gray-700">Orders Today</h2>
                                <p class="text-3xl font-bold text-red-600 mt-2">25</p>
                            </div>
                            <div class="bg-red-600 p-3 rounded-full text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8h18M3 16h18M8 21h8m-8 0a4 4 0 010-8m8 8a4 4 0 010-8" />
                                </svg>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>