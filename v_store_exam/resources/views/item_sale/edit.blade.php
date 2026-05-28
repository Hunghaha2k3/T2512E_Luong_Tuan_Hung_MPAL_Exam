@extends('item_sale.layout')

@section('title', 'Edit Item')

@section('content')
<div class="mx-auto w-full max-w-xl rounded-xl border border-slate-300/70 bg-white p-4 shadow-sm sm:p-5">
    <h1 class="mb-3 text-4xl font-bold tracking-tight text-slate-800">Edit Item #{{ $itemSale->id }}</h1>

    @if($errors->any())
        <div class="mb-3 rounded-lg border border-red-200 bg-red-50 px-3 py-2 text-sm text-red-700">
            <ul class="list-disc space-y-1 pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('item-sale.update', $itemSale) }}" class="space-y-3">
        @csrf
        @method('PUT')

        <div>
            <label class="mb-1 block font-semibold text-slate-800">Item Code</label>
            <input type="text" name="item_code" value="{{ old('item_code', $itemSale->item_code) }}" class="w-full rounded-lg border-2 border-teal-700 bg-white px-3 py-2.5 outline-none focus:ring-2 focus:ring-teal-200">
        </div>

        <div>
            <label class="mb-1 block font-semibold text-slate-800">Item Name</label>
            <input type="text" name="item_name" value="{{ old('item_name', $itemSale->item_name) }}" class="w-full rounded-lg border-2 border-teal-700 bg-white px-3 py-2.5 outline-none focus:ring-2 focus:ring-teal-200">
        </div>

        <div>
            <label class="mb-1 block font-semibold text-slate-800">Quantity</label>
            <input type="number" step="0.01" name="quantity" value="{{ old('quantity', $itemSale->quantity) }}" class="w-full rounded-lg border-2 border-teal-700 bg-white px-3 py-2.5 outline-none focus:ring-2 focus:ring-teal-200">
        </div>

        <div>
            <label class="mb-1 block font-semibold text-slate-800">Expired Date</label>
            <input type="date" name="expried_date" value="{{ old('expried_date', $itemSale->expried_date) }}" class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 outline-none focus:border-teal-700 focus:ring-2 focus:ring-teal-200">
        </div>

        <div>
            <label class="mb-1 block font-semibold text-slate-800">Note</label>
            <textarea name="note" rows="3" class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 outline-none focus:border-teal-700 focus:ring-2 focus:ring-teal-200">{{ old('note', $itemSale->note) }}</textarea>
        </div>

        <div class="flex items-center gap-4 pt-1">
            <button type="submit" class="flex-1 rounded-md bg-teal-700 px-4 py-2.5 font-semibold text-white hover:bg-teal-800">Update Item</button>
            <a href="{{ route('item-sale.index') }}" class="font-semibold text-slate-700 underline">Back to list</a>
        </div>
    </form>
</div>
@endsection
