<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Livewire\Admin\CreateProduct;
use App\Http\Livewire\Admin\EditProduct;
use App\Http\Livewire\Admin\ShowProdcuts;
use Illuminate\Support\Facades\Route;

Route::get('/',ShowProdcuts::class)->name('admin.index');

Route::get('products/create',CreateProduct::class)->name('admin.products.create');

Route::get('products/{product}/edit', EditProduct::class)->name('admin.products.edit');

Route::post('products/{product}/files', [ProductController::class,'files'])->name('admin.products.files');
