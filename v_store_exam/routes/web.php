<?php

use App\Http\Controllers\ItemSaleController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/item-sale');
Route::view('/reports', 'item_sale.reports')->name('reports');
Route::resource('item-sale', ItemSaleController::class)->only([
    'index', 'create', 'store', 'edit', 'update', 'destroy',
]);
