@extends('item_sale.layout')

@section('title', 'Sale Items')

@section('content')
<div class="rounded-xl border border-slate-300/70 bg-white p-4 shadow-sm sm:p-5">
    <div class="mb-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h1 class="text-4xl font-bold tracking-tight text-teal-800">Sale Items</h1>
        <div class="flex w-full flex-col gap-2 sm:w-auto sm:flex-row sm:items-center">
            <div class="relative sm:w-72">
                <span class="pointer-events-none absolute inset-y-0 left-3 flex items-center text-slate-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-4.35-4.35M10.8 18a7.2 7.2 0 1 1 0-14.4 7.2 7.2 0 0 1 0 14.4Z"/></svg>
                </span>
                <input type="text" placeholder="Search ..." class="w-full rounded-lg border border-slate-300 bg-white py-2 pl-9 pr-3 text-sm outline-none focus:border-teal-600 focus:ring-2 focus:ring-teal-200">
            </div>
            <a href="{{ route('item-sale.create') }}" class="inline-flex items-center justify-center rounded-md bg-teal-700 px-4 py-2 text-sm font-semibold text-white transition hover:bg-teal-800">+ Add New Item</a>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-3 rounded-lg border border-emerald-200 bg-emerald-50 px-3 py-2 text-sm text-emerald-700">{{ session('success') }}</div>
    @endif

    <div class="overflow-x-auto rounded-xl border border-slate-300/80">
        <table class="min-w-full border-separate border-spacing-0 text-sm">
            <thead class="bg-slate-100">
            <tr>
                <th class="border-b border-r border-slate-300 px-3 py-2 text-left font-bold">ID</th>
                <th class="border-b border-r border-slate-300 px-3 py-2 text-left font-bold">Item Code</th>
                <th class="border-b border-r border-slate-300 px-3 py-2 text-left font-bold">Item Name</th>
                <th class="border-b border-r border-slate-300 px-3 py-2 text-left font-bold">Quantity</th>
                <th class="border-b border-r border-slate-300 px-3 py-2 text-left font-bold">Expired Date</th>
                <th class="border-b border-r border-slate-300 px-3 py-2 text-left font-bold">Note</th>
                <th class="border-b border-slate-300 px-3 py-2 text-center font-bold">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($items as $item)
                <tr class="hover:bg-slate-50">
                    <td class="border-b border-r border-slate-300 px-3 py-2">{{ $item->id }}</td>
                    <td class="border-b border-r border-slate-300 px-3 py-2">{{ $item->item_code }}</td>
                    <td class="border-b border-r border-slate-300 px-3 py-2">{{ ucwords(strtolower($item->item_name)) }}</td>
                    <td class="border-b border-r border-slate-300 px-3 py-2">{{ rtrim(rtrim(number_format((float)$item->quantity, 2, '.', ''), '0'), '.') }}</td>
                    <td class="border-b border-r border-slate-300 px-3 py-2">{{ $item->expried_date }}</td>
                    <td class="border-b border-r border-slate-300 px-3 py-2">{{ $item->note }}</td>
                    <td class="border-b border-slate-300 px-3 py-1.5 text-center">
                        <div class="inline-flex items-center justify-center gap-2">
                            <a href="{{ route('item-sale.edit', $item) }}" class="flex h-8 w-8 items-center justify-center rounded-md bg-teal-700 text-white transition hover:bg-teal-800" title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-4 w-4"><path d="M3 17.25V21h3.75l11-11.03-3.75-3.75L3 17.25Zm17.71-10.04a1.003 1.003 0 0 0 0-1.42L18.21 3.29a1.003 1.003 0 0 0-1.42 0l-1.83 1.83 3.75 3.75 2-1.66Z" /></svg>
                            </a>
                            <form action="{{ route('item-sale.destroy', $item) }}" method="POST" class="m-0" onsubmit="return confirm('Delete this item?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="flex h-8 w-8 items-center justify-center rounded-md bg-rose-600 text-white transition hover:bg-rose-700" title="Delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-4 w-4"><path d="M9 3a1 1 0 0 0-1 1v1H5a1 1 0 1 0 0 2h1v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7h1a1 1 0 1 0 0-2h-3V4a1 1 0 0 0-1-1H9Zm1 2h4v1h-4V5Zm-1 5a1 1 0 1 1 2 0v7a1 1 0 1 1-2 0v-7Zm5-1a1 1 0 1 0-2 0v7a1 1 0 1 0 2 0v-7Z"/></svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="px-3 py-6 text-center text-slate-500">No data yet.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
