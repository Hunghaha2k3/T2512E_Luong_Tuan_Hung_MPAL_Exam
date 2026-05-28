@extends('item_sale.layout')

@section('title', 'Edit Item')

@section('content')
    <div class="mx-auto w-full max-w-xl px-4 sm:px-0">
        <!-- Card chính: Bo góc rộng hơn, đổ bóng mềm mịn và đổi màu viền tinh tế -->
        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-md sm:p-7">

            <!-- Tiêu đề: Hạ kích thước từ text-4xl xuống text-2xl để cân bằng thị giác, thêm mã ID nổi bật -->
            <h1 class="mb-5 text-2xl font-bold tracking-tight text-slate-900 flex items-center gap-2">
                <span>Edit Item</span>
                <span class="rounded-md bg-slate-100 px-2 py-0.5 text-sm font-semibold text-slate-600">#{{ $itemSale->id }}</span>
            </h1>

            <!-- Khu vực thông báo lỗi: Thiết kế lại gọn gàng, trực quan và dịu mắt hơn -->
            @if($errors->any())
                <div class="mb-5 rounded-xl border border-rose-100 bg-rose-50/70 p-3.5 text-xs font-medium text-rose-700">
                    <div class="mb-1.5 flex items-center gap-1.5 font-bold uppercase tracking-wider text-rose-800">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                        <span>Please fix the following errors</span>
                    </div>
                    <ul class="list-disc space-y-1 pl-5">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('item-sale.update', $itemSale) }}" class="space-y-4">
                @csrf
                @method('PUT')

                <!-- Ô nhập liệu: Đồng bộ hóa giao diện, bỏ viền xanh teal dày, dùng nền xám nhẹ chuyển trắng khi focus -->
                <div>
                    <label class="mb-1.5 block text-xs font-bold uppercase tracking-wider text-slate-700">Item Code</label>
                    <input type="text" name="item_code" value="{{ old('item_code', $itemSale->item_code) }}"
                           class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-3.5 py-2.5 text-sm text-slate-900 outline-none transition-all duration-200 placeholder-slate-400 focus:border-blue-600 focus:bg-white focus:ring-4 focus:ring-blue-50/80">
                </div>

                <div>
                    <label class="mb-1.5 block text-xs font-bold uppercase tracking-wider text-slate-700">Item Name</label>
                    <input type="text" name="item_name" value="{{ old('item_name', $itemSale->item_name) }}"
                           class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-3.5 py-2.5 text-sm text-slate-900 outline-none transition-all duration-200 placeholder-slate-400 focus:border-blue-600 focus:bg-white focus:ring-4 focus:ring-blue-50/80">
                </div>

                <div>
                    <label class="mb-1.5 block text-xs font-bold uppercase tracking-wider text-slate-700">Quantity</label>
                    <input type="number" step="0.01" name="quantity" value="{{ old('quantity', $itemSale->quantity) }}"
                           class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-3.5 py-2.5 text-sm text-slate-900 outline-none transition-all duration-200 placeholder-slate-400 focus:border-blue-600 focus:bg-white focus:ring-4 focus:ring-blue-50/80">
                </div>

                <div>
                    <label class="mb-1.5 block text-xs font-bold uppercase tracking-wider text-slate-700">Expired Date</label>
                    <input type="date" name="expried_date" value="{{ old('expried_date', $itemSale->expried_date) }}"
                           class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-3.5 py-2.5 text-sm text-slate-900 outline-none transition-all duration-200 focus:border-blue-600 focus:bg-white focus:ring-4 focus:ring-blue-50/80">
                </div>

                <div>
                    <label class="mb-1.5 block text-xs font-bold uppercase tracking-wider text-slate-700">Note</label>
                    <textarea name="note" rows="3"
                              class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-3.5 py-2.5 text-sm text-slate-900 outline-none transition-all duration-200 placeholder-slate-400 focus:border-blue-600 focus:bg-white focus:ring-4 focus:ring-blue-50/80">{{ old('note', $itemSale->note) }}</textarea>
                </div>

                <!-- Khu vực nút bấm: Đảo vị trí (Hủy bên trái, Cập nhật bên phải), nút chính màu xanh đậm mạnh mẽ -->
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-3 border-t border-slate-100">
                    <a href="{{ route('item-sale.index') }}"
                       class="order-2 sm:order-1 text-sm font-semibold text-slate-500 hover:text-slate-800 transition-colors duration-150">
                        Cancel
                    </a>
                    <button type="submit"
                            class="order-1 sm:order-2 w-full sm:w-auto rounded-xl bg-slate-900 px-6 py-3 text-sm font-semibold text-white shadow-sm transition-all duration-150 hover:bg-slate-800 active:scale-[0.98]">
                        Update Item
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
