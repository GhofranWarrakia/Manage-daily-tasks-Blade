<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// تعريف جميع توجيهات المصادقة
Auth::routes();

// الصفحة الرئيسية بعد تسجيل الدخول
Route::get('/home', [HomeController::class, 'index'])->name('home');

// توجيهات المهام
Route::middleware(['auth'])->group(function () {
    // عرض قائمة المهام اليومية
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

    // إضافة مهمة جديدة
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

    // تعديل مهمة موجودة
    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');

    // حذف مهمة
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');

    // تغيير حالة المهمة بين "Pending" و "Completed"
    Route::put('/tasks/{id}/status', [TaskController::class, 'updateStatus'])->name('tasks.updateStatus');

});
