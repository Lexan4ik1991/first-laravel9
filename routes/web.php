<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;

// Route::get('/',[Todo::class,'index'])->name('index');

// Route::post('/todos',[Todo::class,'store'])->name('todos.store');

Route::get('/', function () {
    return view('todos.index');
});

Route::get('todos', [TodosController::class,'index'])->name('index');
Route::get('todos/{todo}', [TodosController::class,'show'])->name('todos.show');
Route::get('new-todos', [TodosController::class,'create'])->name('todos.create');
Route::post('store-todos', [TodosController::class,'store'])->name('todos.store');
Route::get('todos/{todo}/edit', [TodosController::class,'edit'])->name('todos.edit');
Route::post('todos/{todo}/update-todos', [TodosController::class,'update'])->name('todos.update');
Route::get('todos/{todo}/delete', [TodosController::class,'destroy'])->name('todos.destroy');
Route::post('todos/{todo}/complete', [TodosController::class,'complete'])->name("todos.complete");
