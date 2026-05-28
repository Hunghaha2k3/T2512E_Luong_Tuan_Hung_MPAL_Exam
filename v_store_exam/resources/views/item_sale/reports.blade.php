@extends('item_sale.layout')

@section('title', 'Reports')

@section('content')
<div class="mx-auto w-full max-w-5xl rounded-2xl border border-slate-200 bg-white p-8 shadow-sm">
    <h1 class="text-2xl font-semibold tracking-tight text-slate-900">Reports</h1>
    <p class="mt-2 text-sm text-slate-500">This is a placeholder report view for dashboard navigation consistency.</p>
    <div class="mt-6 grid gap-4 sm:grid-cols-3">
        <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
            <p class="text-xs uppercase tracking-wide text-slate-500">Total Items</p>
            <p class="mt-1 text-2xl font-semibold text-slate-900">{{ \App\Models\ItemSale::count() }}</p>
        </div>
        <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
            <p class="text-xs uppercase tracking-wide text-slate-500">Active Records</p>
            <p class="mt-1 text-2xl font-semibold text-slate-900">{{ \App\Models\ItemSale::whereNotNull('id')->count() }}</p>
        </div>
        <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
            <p class="text-xs uppercase tracking-wide text-slate-500">Low Stock (&lt; 20)</p>
            <p class="mt-1 text-2xl font-semibold text-slate-900">{{ \App\Models\ItemSale::where('quantity', '<', 20)->count() }}</p>
        </div>
    </div>
</div>
@endsection
