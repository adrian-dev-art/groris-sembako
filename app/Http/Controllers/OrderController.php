<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Asset;


class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('asset')->get();

        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $products = Asset::all();

        return view('orders.create', compact('products'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'asset_id' => 'required|exists:assets,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Get the selected asset (product)
        $asset = Asset::findOrFail($request->input('asset_id'));

        // Calculate the total amount
        $totalAmount = $asset->price * $request->input('quantity');

        // Create a new order
        $order = Order::create([
            'asset_id' => $asset->id,
            'quantity' => $request->input('quantity'),
            'total_amount' => $totalAmount,
        ]);

        // Redirect to the order details page
        return redirect()->route('orders.show', ['order' => $order->id])->with('success', 'Order placed successfully!');
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $products = Asset::all();
        return view('orders.edit', compact('order', 'products'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'asset_id' => 'required|exists:assets,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $asset = Asset::findOrFail($request->input('asset_id'));
        $totalAmount = $asset->price * $request->input('quantity');

        $order->update([
            'asset_id' => $asset->id,
            'quantity' => $request->input('quantity'),
            'total_amount' => $totalAmount,
        ]);

        return redirect()->route('orders.show', $order)->with('success', 'Order updated successfully!');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully!');
    }
}
