@extends('item_sale.layout')

@section('title', 'Sale Items')

@section('content')
    <!-- Container chính: Đổ bóng mịn màng, loại bỏ viền thô, tạo khoảng trống thoáng đãng hơn -->
    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">

        <!-- Thanh công cụ: Sắp xếp lại bố cục, tiêu đề chữ đen sâu gọn gàng -->
        <div class="mb-5 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold tracking-tight text-slate-900">Sale Items</h1>
                <p class="mt-0.5 text-xs text-slate-500">Manage and track your product inventory balances.</p>
            </div>

            <div class="flex w-full flex-col gap-2.5 sm:w-auto sm:flex-row sm:items-center">
                <!-- Thanh tìm kiếm: Tối ưu hiệu ứng focus trượt nhẹ, bo góc rộng -->
                <div class="relative sm:w-64">
                <span class="pointer-events-none absolute inset-y-0 left-3 flex items-center text-slate-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-4.35-4.35M10.8 18a7.2 7.2 0 1 1 0-14.4 7.2 7.2 0 0 1 0 14.4Z"/></svg>
                </span>
                    <input type="text" placeholder="Search item code or name..."
                           class="w-full rounded-xl border border-slate-200 bg-slate-50/50 py-2 pl-9 pr-3 text-sm text-slate-900 outline-none transition-all duration-200 placeholder-slate-400 focus:border-slate-900 focus:bg-white focus:ring-4 focus:ring-slate-100">
                </div>
                <!-- Nút thêm mới: Phong cách tối giản màu đen tinh tế, bo góc đồng bộ -->
                <a href="{{ route('item-sale.create') }}"
                   class="inline-flex items-center justify-center gap-1.5 rounded-xl bg-slate-900 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition-all duration-150 hover:bg-slate-800 active:scale-[0.98]">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                    <span>Add Item</span>
                </a>
            </div>
        </div>

        <!-- Thông báo Success: Thiết kế dạng Banner phẳng dịu mắt kèm icon -->
        @if(session('success'))
            <div class="mb-4 flex items-center gap-2 rounded-xl border border-emerald-100 bg-emerald-50/60 px-4 py-3 text-xs font-medium text-emerald-800">
                <svg class="h-4 w-4 text-emerald-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <!-- Bảng dữ liệu: Loại bỏ border-spacing, sử dụng đường kẻ ngang mảnh tinh tế (border-y) -->
        <div class="overflow-x-auto rounded-xl border border-slate-200">
            <table class="min-w-full border-collapse text-sm">
                <thead class="bg-slate-50/70 border-b border-slate-200">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wider text-slate-500">ID</th>
                    <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wider text-slate-500">Item Code</th>
                    <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wider text-slate-500">Item Name</th>
                    <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wider text-slate-500">Quantity</th>
                    <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wider text-slate-500">Expired Date</th>
                    <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wider text-slate-500">Note</th>
                    <th class="px-4 py-3 text-center text-xs font-bold uppercase tracking-wider text-slate-500">Actions</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                @forelse($items as $item)
                    <tr class="hover:bg-slate-50/80 transition-colors duration-100">
                        <td class="px-4 py-3.5 font-medium text-slate-400">#{{ $item->id }}</td>
                        <td class="px-4 py-3.5"><span class="rounded-md bg-slate-100 px-2 py-0.5 text-xs font-mono font-bold text-slate-700">{{ $item->item_code }}</span></td>
                        <td class="px-4 py-3.5 font-semibold text-slate-900">{{ ucwords(strtolower($item->item_name)) }}</td>
                        <td class="px-4 py-3.5 font-mono text-slate-700">{{ rtrim(rtrim(number_format((float)$item->quantity, 2, '.', ''), '0'), '.') }}</td>
                        <td class="px-4 py-3.5 text-slate-600">
                            <!-- Định dạng nhẹ ngày hết hạn: Chuyển màu nhạt nếu không có -->
                            @if($item->expried_date)
                                <span class="inline-flex items-center gap-1">
                                <svg class="h-3.5 w-3.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2z" /></svg>
                                {{ $item->expried_date }}
                            </span>
                            @else
                                <span class="text-slate-300">-</span>
                            @endif
                        </td>
                        <td class="px-4 py-3.5 text-slate-500 max-w-xs truncate" title="{{ $item->note }}">{{ $item->note ?? '-' }}</td>
                        <td class="px-4 py-3.5 text-center">
                            <div class="inline-flex items-center justify-center gap-1.5">
                                <!-- Nút Sửa: Đổi sang icon màu slate nhẹ nhàng, chỉ đậm lên khi hover -->
                                <a href="{{ route('item-sale.edit', $item) }}"
                                   class="flex h-8 w-8 items-center justify-center rounded-lg border border-slate-200 bg-white text-slate-600 transition-all shadow-sm hover:border-slate-300 hover:bg-slate-50 hover:text-slate-900" title="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" /></svg>
                                </a>
                                <form action="{{ route('item-sale.destroy', $item) }}" method="POST" class="m-0" onsubmit="return confirm('Delete this item?');">
                                    @csrf
                                    @method('DELETE')
                                    <!-- Nút Xóa: Đổi sang viền đỏ nhạt, giảm bớt độ chói mắt -->
                                    <button type="submit"
                                            class="flex h-8 w-8 items-center justify-center rounded-lg border border-rose-100 bg-white text-rose-600 transition-all shadow-sm hover:border-rose-200 hover:bg-rose-50 hover:text-rose-700" title="Delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.34 6.6dM9.25 15.6l-.34-6.6M19.25 4v1a2 2 0 0 1-2 2H6.75a2 2 0 0 1-2-2V4m14.5 0h-3.5a1 1 0 0 0-1-1h-3.5a1 1 0 0 0-1 1H4.75m10.5 3v11.25A2.25 2.25 0 0 1 13 20.5H11a2.25 2.25 0 0 1-2.25-2.25V7.25" /></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-8 text-center text-xs font-medium text-slate-400">
                            <div class="flex flex-col items-center justify-center gap-2">
                                <svg class="h-8 w-8 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0a2 2 0 01-2 2H6a2 2 0 01-2-2m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" /></svg>
                                <span>No data items found.</span>
                            </div>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
