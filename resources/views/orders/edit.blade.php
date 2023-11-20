<!-- resources/views/orders/edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight">
            {{ __('Edit Order') }}
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

                <form action="{{ route('orders.update', $order->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="asset_id" class="block text-sm font-medium text-white dark:text-gray-200">Asset</label>
                        <select name="asset_id" id="asset_id" class="form-select mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700" required>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}" {{ $order->asset_id == $product->id ? 'selected' : '' }}>{{ $product->name }} - Rp. {{ $product->price }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="quantity" class="block text-sm font-medium text-white dark:text-gray-200">Quantity</label>
                        <input type="number" class="form-input mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 " id="quantity" name="quantity" value="{{ old('quantity', $order->quantity) }}" min="1" required>
                    </div>
                    <button type="submit" class="btn bg-blue-500 hover:bg-blue-600 text-white focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-800">Update Order</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
