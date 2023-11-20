<!-- resources/views/orders/show.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Order Details') }}
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

                <h3 class="text-lg font-medium mb-4">Order Information</h3>

                <p><strong>Order ID:</strong> {{ $order->id }}</p>
                <p><strong>Product:</strong> {{ $order->asset->name }}</p>
                <p><strong>Quantity:</strong> {{ $order->quantity }}</p>
                <p><strong>Total Amount:</strong> Rp. {{ number_format($order->total_amount, 2) }}</p>
                <p><strong>Order Date:</strong> {{ $order->created_at->format('F d, Y H:i:s') }}</p>

                <div class="mt-6">
                    <a href="{{ route('orders.edit', $order) }}" class="btn bg-blue-500 hover:bg-blue-600 text-white focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-800">Edit Order</a>
                    
                    <form action="{{ route('orders.destroy', $order) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn bg-red-500 hover:bg-red-600 text-white focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-800" onclick="return confirm('Are you sure you want to delete this order?')">Delete Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
