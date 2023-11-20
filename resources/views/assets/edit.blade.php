<!-- resources/views/assets/edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Asset') }}
        </h2>
    </x-slot>

    <div class="py-6 sm:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('assets.update', $asset->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-600 dark:text-gray-300">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $asset->name) }}" class="mt-1 p-2 border rounded-md w-full" required>
                    </div>

                    <div class="mb-4">
                        <label for="category" class="block text-sm font-medium text-gray-600 dark:text-gray-300">Category</label>
                        <input type="text" name="category" id="category" value="{{ old('category', $asset->category) }}" class="mt-1 p-2 border rounded-md w-full" required>
                    </div>

                    <div class="mb-4">
                        <label for="price" class="block text-sm font-medium text-gray-600 dark:text-gray-300">Price</label>
                        <input type="number" name="price" id="price" value="{{ old('price', $asset->price) }}" class="mt-1 p-2 border rounded-md w-full" required>
                    </div>

                    <div class="mb-4">
                        <label for="quantity" class="block text-sm font-medium text-gray-600 dark:text-gray-300">Quantity</label>
                        <input type="number" name="quantity" id="quantity" value="{{ old('quantity', $asset->quantity) }}" class="mt-1 p-2 border rounded-md w-full" required>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-600 dark:text-gray-300">Description</label>
                        <textarea name="description" id="description" rows="3" class="mt-1 p-2 border rounded-md w-full">{{ old('description', $asset->description) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="image" class="block text-sm font-medium text-gray-600 dark:text-gray-300">Image</label>
                        <input type="file" name="image" id="image" class="mt-1 p-2 border rounded-md w-full">
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="btn bg-blue-500 hover:bg-blue-600 text-white focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-800">Update Asset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
