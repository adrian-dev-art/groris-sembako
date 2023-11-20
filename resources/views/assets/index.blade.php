<!-- resources/views/assets/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Asset Management') }}
        </h2>
    </x-slot>

    <div class="p-6 sm:p-12">

        <div class="mt-6 mb-10">
            <a href="{{ route('assets.create') }}"
                class=" mb-10 btn bg-blue-500 hover:bg-blue-600 text-white focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-800">Create
                Asset</a>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                @foreach ($assets as $asset)
                    <div
                        class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex flex-col sm:flex-row">
                        <div class="w-full sm:w-1/3 overflow-hidden mb-4 sm:mb-0">
                            <img src="{{ asset('storage/' . $asset->image) }}" alt="{{ $asset->name }}"
                                class="object-cover w-full h-full">
                        </div>

                        <div class="w-full sm:w-2/3 p-4">
                            <h3 class="text-lg font-semibold mb-2 text-gray-800 dark:text-gray-200">{{ $asset->name }}
                            </h3>
                            <p class="text-gray-600 dark:text-gray-300 mb-2">{{ $asset->description }}</p>
                            <p class="text-gray-700 dark:text-gray-300">Category: {{ $asset->category }}</p>
                            <p class="text-gray-700 dark:text-gray-300">Price: Rp. {{ $asset->price }}</p>
                            <p class="text-gray-700 dark:text-gray-300">Quantity: {{ $asset->quantity }}</p>

                            <div class="mt-4 flex justify-between items-center">
                                <a href="{{ route('assets.edit', $asset->id) }}"
                                    class="text-white hover:underline">Edit</a>

                                <form action="{{ route('assets.destroy', $asset->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-white hover:underline">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


        </div>
    </div>
</x-app-layout>
