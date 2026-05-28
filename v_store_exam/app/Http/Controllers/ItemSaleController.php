<?php

namespace App\Http\Controllers;

use App\Models\ItemSale;
use Illuminate\Http\Request;

class ItemSaleController extends Controller
{
    public function index()
    {
        $items = ItemSale::orderByDesc('id')->paginate(15);
        return view('item_sale.index', compact('items'));
    }

    public function create()
    {
        return view('item_sale.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_code' => ['required', 'regex:/^[A-Za-z0-9]+$/', 'max:6'],
            'item_name' => ['required', 'regex:/^[A-Za-z0-9 ]+$/', 'max:50'],
            'quantity' => ['required', 'numeric'],
            'expried_date' => ['required', 'date'],
            'note' => ['nullable', 'max:60'],
        ]);

        ItemSale::create($validated);

        return redirect()->route('item-sale.index')->with('success', 'Added item successfully.');
    }

    public function edit(ItemSale $itemSale)
    {
        return view('item_sale.edit', compact('itemSale'));
    }

    public function update(Request $request, ItemSale $itemSale)
    {
        $validated = $request->validate([
            'item_code' => ['required', 'regex:/^[A-Za-z0-9]+$/', 'max:6'],
            'item_name' => ['required', 'regex:/^[A-Za-z0-9 ]+$/', 'max:50'],
            'quantity' => ['required', 'numeric'],
            'expried_date' => ['required', 'date'],
            'note' => ['nullable', 'max:60'],
        ]);

        $itemSale->update($validated);

        return redirect()->route('item-sale.index')->with('success', 'Updated item successfully.');
    }

    public function destroy(ItemSale $itemSale)
    {
        $itemSale->delete();

        return redirect()->route('item-sale.index')->with('success', 'Deleted item successfully.');
    }
}
