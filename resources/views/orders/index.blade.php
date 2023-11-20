<!-- resources/views/orders/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Order Management') }}
        </h2>
    </x-slot>

    <div class="py-6 sm:py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 text-white">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="bg-blue-500 p-6 rounded-lg">
                    <h3 class="text-lg font-medium mb-4">Order List</h3>

                    @if ($orders->isEmpty())
                        <p>No orders found.</p>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach ($orders as $order)
                                <a href="{{ route('orders.show', $order->id) }}" class="bg-white dark:bg-gray-700 p-4 rounded-md shadow-md hover:bg-gray-100 focus:outline-none focus:shadow-outline-blue">
                                    <p class="text-xl font-semibold mb-2">Order #{{ $order->id }}</p>
                                    <p class="text-gray-600 dark:text-gray-300">Product: {{ $order->asset->name }}</p>
                                    <p class="text-gray-600 dark:text-gray-300">Quantity: {{ $order->quantity }}</p>
                                    <p class="text-gray-600 dark:text-gray-300">Total Amount: Rp. {{ number_format($order->total_amount, 2) }}</p>
                                    <!-- Add more details as needed -->
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
