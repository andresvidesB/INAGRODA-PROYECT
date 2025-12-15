<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| RUTAS PÚBLICAS (Accesibles para todos)
|--------------------------------------------------------------------------
*/

Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/nosotros', [PublicController::class, 'about'])->name('about');
Route::get('/servicios', [PublicController::class, 'services'])->name('services'); // Ruta Nueva
Route::get('/blog', [PublicController::class, 'blog'])->name('blog');
Route::get('/blog/{slug}', [PublicController::class, 'showPost'])->name('blog.show');
Route::get('/contacto', [PublicController::class, 'contact'])->name('contact');
Route::post('/contacto', [PublicController::class, 'sendMessage'])->name('contact.send');


/*
|--------------------------------------------------------------------------
| RUTAS DE ADMINISTRACIÓN (Solo Admin)
|--------------------------------------------------------------------------
| Middleware: 'auth' (logueado), 'verified' (email verificado), 'admin' (es jefe)
*/

Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    
    // 1. DASHBOARD (Estadísticas)
    // Apunta al método 'dashboard', NO al 'index'
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // 2. GESTIÓN DE PUBLICACIONES (CRUD)
    // IMPORTANTE: Aquí estaba tu error. Quitamos 'index' del except.
    // Ahora Laravel creará la ruta 'posts.index' que buscaba el botón.
    Route::resource('admin/posts', AdminController::class)->except(['show']);
    
    // 3. GESTIÓN DE MENSAJES
    Route::get('/admin/mensajes', [AdminController::class, 'messages'])->name('admin.messages');

    // 4. GESTIÓN DE USUARIOS
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users.index');
    Route::get('/admin/users/{id}', [AdminController::class, 'showUser'])->name('admin.users.show');

    // 5. GESTIÓN DE SERVICIOS
    Route::get('/admin/services', [AdminController::class, 'services'])->name('admin.services.index');
    Route::get('/admin/services/create', [AdminController::class, 'createService'])->name('admin.services.create');
    Route::post('/admin/services', [AdminController::class, 'storeService'])->name('admin.services.store');
    Route::delete('/admin/services/{id}', [AdminController::class, 'destroyService'])->name('admin.services.destroy');

});


/*
|--------------------------------------------------------------------------
| RUTAS DE USUARIO AUTENTICADO (Cliente / Normal)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    // Gestión de Mensajes
    Route::get('/admin/mensajes', [AdminController::class, 'messages'])->name('admin.messages');
    // NUEVA RUTA PARA CAMBIAR ESTADO
    Route::patch('/admin/mensajes/{id}/toggle', [AdminController::class, 'toggleReadStatus'])->name('admin.messages.toggle');
    // Dashboard del Cliente
    Route::get('/mi-cuenta', function () {
        return view('user.dashboard');
    })->name('user.dashboard');

    // Perfil (Cambiar contraseña, borrar cuenta)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/*
|--------------------------------------------------------------------------
| RUTAS DE AUTENTICACIÓN (Breeze)
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';