@extends('item_sale.layout')

@section('title', 'Create Item')

@section('content')
    <div class="mx-auto w-full max-w-xl px-4 sm:px-0">
        <div class="mb-4 text-xs font-bold tracking-wide uppercase text-indigo-600 flex items-center gap-1.5">
            <span>Items</span>
            <span class="text-slate-300 font-normal">/</span>
            <span class="text-slate-500 font-medium">Create</span>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-md sm:p-6">
            <form method="POST" action="{{ route('item-sale.store') }}" class="space-y-4">
                @csrf

                <div>
                    <label class="mb-1.5 block text-xs font-bold uppercase tracking-wider text-slate-700">Item Code</label>
                    <input type="text" name="item_code" value="{{ old('item_code') }}"
                           class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-3.5 py-2.5 text-slate-900 outline-none transition-all duration-200 placeholder-slate-400 focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-100">
                </div>

                <div>
                    <label class="mb-1.5 block text-xs font-bold uppercase tracking-wider text-slate-700">Item Name</label>
                    <input type="text" name="item_name" value="{{ old('item_name') }}"
                           class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-3.5 py-2.5 text-slate-900 outline-none transition-all duration-200 placeholder-slate-400 focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-100">
                    @error('item_name')<p class="mt-1.5 text-xs font-medium text-rose-600">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="mb-1.5 block text-xs font-bold uppercase tracking-wider text-slate-700">Quantity</label>
                    <input type="number" step="0.01" name="quantity" value="{{ old('quantity') }}"
                           class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-3.5 py-2.5 text-slate-900 outline-none transition-all duration-200 placeholder-slate-400 focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-100">
                    @error('expried_date')<p class="mt-1.5 text-xs font-medium text-rose-600">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="mb-1.5 block text-xs font-bold uppercase tracking-wider text-slate-700">Expired Date</label>
                    <input type="date" name="expried_date" value="{{ old('expried_date') }}"
                           class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-3.5 py-2.5 text-slate-900 outline-none transition-all duration-200 focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-100">
                </div>

                <div>
                    <label class="mb-1.5 block text-xs font-bold uppercase tracking-wider text-slate-700">Note</label>
                    <textarea name="note" rows="3"
                              class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-3.5 py-2.5 text-slate-900 outline-none transition-all duration-200 placeholder-slate-400 focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-100">{{ old('note') }}</textarea>
                </div>

                <div class="flex flex-col sm:flex-row items-center gap-4 pt-2">
                    <button type="submit"
                            class="w-full sm:flex-1 rounded-xl bg-indigo-600 px-5 py-3 font-semibold text-white shadow-sm transition-all duration-150 hover:bg-indigo-700 active:scale-[0.98]">
                        Save Item
                    </button>
                    <a href="{{ route('item-sale.index') }}"
                       class="text-sm font-semibold text-slate-600 hover:text-indigo-600 transition-colors duration-150">
                        Back to list
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
