<!-- resources/views/assets/create.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight">
            {{ __('Create New Asset') }}
        </h2>
    </x-slot>

    <div class="py-6 sm:py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                @if ($errors->any())
                    <div class="alert alert-danger text-white">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('assets.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-white dark:text-gray-200">Name</label>
                        <input type="text" class="form-input mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700" id="name" name="name" value="{{ old('name') }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="image" class="block text-sm font-medium text-white dark:text-gray-200">Image</label>
                        <input type="file" class="form-input mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700" id="image" name="image" accept="image/*" required>
                    </div>
                    <div class="mb-4">
                        <label for="category" class="block text-sm font-medium text-white dark:text-gray-200">Category</label>
                        <input type="text" class="form-input mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700" id="category" name="category" value="{{ old('category') }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="price" class="block text-sm font-medium text-white dark:text-gray-200">Price</label>
                        <input type="number" class="form-input mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700" id="price" name="price" value="{{ old('price') }}" step="0.01" required>
                    </div>
                    <div class="mb-4">
                        <label for="quantity" class="block text-sm font-medium text-white dark:text-gray-200">Quantity</label>
                        <input type="number" class="form-input mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700" id="quantity" name="quantity" value="{{ old('quantity') }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-white dark:text-gray-200">Description</label>
                        <textarea class="form-input mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                    </div>
                    <button type="submit" class="btn bg-blue-500 hover:bg-blue-600 text-white focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-800">Create Asset</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
