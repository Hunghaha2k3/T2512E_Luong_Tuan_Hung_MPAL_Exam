@extends('item_sale.layout')

@section('title', 'Create Item')

@section('content')
<div class="mx-auto w-full max-w-xl">
    <div class="mb-2 text-sm font-semibold text-teal-700">Items <span class="px-1 text-slate-400">&gt;</span> <span class="text-slate-700">Create</span></div>

    <div class="rounded-xl border border-slate-300/70 bg-white p-4 shadow-sm sm:p-5">
        <form method="POST" action="{{ route('item-sale.store') }}" class="space-y-3">
            @csrf

            <div>
                <label class="mb-1 block text-2sm font-semibold text-slate-800">Item Code</label>
                <input type="text" name="item_code" value="{{ old('item_code') }}" class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 outline-none focus:border-teal-700 focus:ring-2 focus:ring-teal-200">
            </div>

            <div>
                <label class="mb-1 block font-semibold text-slate-800">Item Name</label>
                <input type="text" name="item_name" value="{{ old('item_name') }}" class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 outline-none focus:border-teal-700 focus:ring-2 focus:ring-teal-200">
                @error('item_name')<p class="mt-1 text-sm text-slate-700">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="mb-1 block font-semibold text-slate-800">Quantity</label>
                <input type="number" step="0.01" name="quantity" value="{{ old('quantity') }}" class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 outline-none focus:border-teal-700 focus:ring-2 focus:ring-teal-200">
                @error('expried_date')<p class="mt-1 text-sm text-slate-700">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="mb-1 block font-semibold text-slate-800">Expired Date</label>
                <input type="date" name="expried_date" value="{{ old('expried_date') }}" class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 outline-none focus:border-teal-700 focus:ring-2 focus:ring-teal-200">
            </div>

            <div>
                <label class="mb-1 block font-semibold text-slate-800">Note</label>
                <textarea name="note" rows="3" class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 outline-none focus:border-teal-700 focus:ring-2 focus:ring-teal-200">{{ old('note') }}</textarea>
            </div>

            <div class="flex items-center gap-4 pt-1">
                <button type="submit" class="flex-1 rounded-md bg-teal-700 px-4 py-2.5 font-semibold text-white hover:bg-teal-800">Save Item</button>
                <a href="{{ route('item-sale.index') }}" class="font-semibold text-slate-700 underline">Back to list</a>
            </div>
        </form>
    </div>
</div>
@endsection
