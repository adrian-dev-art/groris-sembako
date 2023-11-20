<!-- resources/views/orders/create.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight">
            {{ __('Create New Order') }}
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

                <form action="{{ route('orders.store') }}" method="POST" id="order-form">
                    @csrf
                    <div class="mb-4">
                        <label for="asset_id" class="block text-sm font-medium text-white dark:text-gray-200">Product</label>
                        <select name="asset_id" id="asset_id" class="form-select mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700" required>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }} - Rp. {{ $product->price }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="quantity" class="block text-sm font-medium text-gray-800 dark:text-gray-200">Quantity</label>
                        <input type="number" class="form-input mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 " id="quantity" name="quantity" value="{{ old('quantity', 1) }}" min="1" required>
                    </div>
                    <button type="button" onclick="showConfirmation()" class="btn bg-blue-500 hover:bg-blue-600 text-white focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-800">Review Order</button>
                    <button type="submit" class="hidden btn bg-blue-500 hover:bg-blue-600 text-white focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-800" id="submit-btn">Create Order</button>
                </form>

                <!-- Confirmation Order Section (Initially Hidden) -->
                <div id="confirmation-section" class="hidden mt-8">
                    <h2 class="text-lg font-semibold mb-4 text-white">Order Summary</h2>
                    <p class="text-white">Product: <span id="confirmation-asset"></span></p>
                    <p class="text-white">Quantity: <span id="confirmation-quantity"></span></p>
                    <p class="text-white">Total Amount: Rp. <span id="confirmation-total"></span></p>
                    <button type="button" onclick="submitOrder()" class="btn bg-green-500 hover:bg-green-600 text-white focus:outline-none focus:border-green-700 focus:ring focus:ring-green-200 active:bg-green-800">Pay Now</button>
                    <button type="button" onclick="editOrder()" class="btn bg-gray-300 text-gray-800 ml-2 hover:bg-gray-400">Edit Order</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showConfirmation() {
            // Retrieve values from the form
            const asset = document.getElementById('asset_id');
            const quantity = document.getElementById('quantity');

            // Update confirmation section with form values
            document.getElementById('confirmation-asset').innerText = asset.options[asset.selectedIndex].text;
            document.getElementById('confirmation-quantity').innerText = quantity.value;
            document.getElementById('confirmation-total').innerText = (parseFloat(asset.options[asset.selectedIndex].text.split('Rp. ')[1]) * parseInt(quantity.value)).toFixed(2);

            // Show confirmation section
            document.getElementById('order-form').classList.add('hidden');
            document.getElementById('confirmation-section').classList.remove('hidden');
        }

        function editOrder() {
            // Hide confirmation section and show form
            document.getElementById('order-form').classList.remove('hidden');
            document.getElementById('confirmation-section').classList.add('hidden');
        }

        function submitOrder() {
            // Submit the form when the "Pay Now" button is clicked
            document.getElementById('submit-btn').click();
        }
    </script>
</x-app-layout>
